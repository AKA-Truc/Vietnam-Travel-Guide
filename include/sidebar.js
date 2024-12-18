document.addEventListener('DOMContentLoaded', function () {
    const sidebar = `
        <div class="sidebar">
            <a href="../blogger/home.php"><img class = "logo" src ="../../../public/image/logo_colored.png"/></a>

            <ul class="main-menu">
                <li><a href="admin.php"><span class="icon"><ion-icon name="home-outline"></ion-icon></span> Trang chủ</a></li>
                <li class="submenu">
                    <a href="user_management.php"><ion-icon name="people-outline"></ion-icon> Quản lý người dùng</a>
                </li>
                <li class="submenu">
                    <a href="post_management.php"><ion-icon name="reader-outline"></ion-icon> Quản lý post</a>
                </li>
                <li class="submenu">
                    <a href="blog_management.php"><ion-icon name="newspaper-outline"></ion-icon> Quản lý blog</a>
                </li>
                <li class="submenu">
                    <a href="province_management.php"><ion-icon name="business"></ion-icon> Quản lý Tỉnh/Thành phố</a>
                </li>
                <li><a href="dashboard.php"><span class="icon"><ion-icon name="analytics"></ion-icon></span> Thống kê</a></li>               
                <li class="submenu">
                    <a href="../../FunctionOfActor/both/logout.php?action=logout"><span class="icon"><ion-icon name="log-out-outline"></ion-icon> Đăng xuất</a>
                </li>
            </ul>
        </div>

        <!-- Nút Toggle Sidebar -->
        <div class="toggle-sidebar" onclick="toggleSidebar()">☰</div>
    `;
    document.body.insertAdjacentHTML('afterbegin', sidebar);

    if (window.innerWidth <= 768) {
        document.getElementById('sidebar').style.width = '0';
    }
});

function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');

    if (sidebar.style.transform === 'translateX(0px)') {
        sidebar.style.transform = 'translateX(-100%)'; 
    } else {
        sidebar.style.transform = 'translateX(0)';
    }
}
