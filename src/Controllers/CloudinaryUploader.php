<?php

class CloudinaryUploader
{
    private $cloudName = 'dt5xizv10';
    private $apiKey = '113462295938149';
    private $apiSecret = 'QiX64lhj43Ll-6Uo6DLZRpHEC70';

    /**
     * Upload file to Cloudinary
     *
     * @param string $fileTmpPath Temporary file path from the form
     * @param string $folder The folder để up hình lên tùy thuộc vào yêu cầu 
     * @return bool|string Returns URL if successful, or false if failed
     */
    public function upload($fileTmpPath, $folder)
    {
        if (empty($fileTmpPath) || !file_exists($fileTmpPath)) {
            return false; // Return false if the file path is invalid
        }

        $url = "https://api.cloudinary.com/v1_1/{$this->cloudName}/image/upload";
        $timestamp = time();
        $signatureString = "timestamp={$timestamp}{$this->apiSecret}";
        
        // Include folder in signature if provided
        if (!empty($folder)) {
            $signatureString = "folder={$folder}&" . $signatureString;
        }
        
        $signature = sha1($signatureString);

        // File data for upload
        $fileData = curl_file_create($fileTmpPath, mime_content_type($fileTmpPath), basename($fileTmpPath));

        // Data to send to Cloudinary
        $data = [
            'file' => $fileData,
            'api_key' => $this->apiKey,
            'timestamp' => $timestamp,
            'signature' => $signature
        ];

        // Add folder to data if provided
        if (!empty($folder)) {
            $data['folder'] = $folder;
        }

        // Initialize cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        // Process the response
        if ($response) {
            $responseData = json_decode($response, true);
            if (isset($responseData['secure_url'])) {
                // Return URL if upload successful
                return $responseData['secure_url'];
            }
        }

        // Return false if upload failed
        return false;
    }
}
?>
