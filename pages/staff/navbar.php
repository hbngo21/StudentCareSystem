<div class='header'>
    <nav class='navbar menu-bar fixed-top navbar-expand-sm'>
        <a class='navbar-brand' href='index.php'>
            Student Care
        </a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbar-list-5' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <i class='fas fa-bars'></i>
        </button>
        <div class='collapse navbar-collapse' id='navbar-list-5'>
            <ul class='navbar-nav ml-auto'>
                <li class='nav-item'>
                    <a class='nav-link' href='index.php'>Trang chủ</a>
                </li>
                <li class='nav-item dropdown'>
                    <div class='nav-link dropdown-toggle' id='serviceDropdown' role='button' data-toggle='dropdown' aria-expanded='false'>
                        Dịch vụ
                    </div>
                    <div class='dropdown-menu' aria-labelledby='serviceDropdown'>
                        <a class='dropdown-item' href='http://localhost/pages/staff/question/questionlist.php'>Hỏi đáp</a>
                        <a class='dropdown-item' href='http://localhost/pages/staff/counselling/counsellingList.php'>Tư vấn tâm lý</a>
                        <a class='dropdown-item' href='http://localhost/pages/staff/services/services.php'>Dịch vụ sinh viên</a>
                        <a class='dropdown-item' href='http://localhost/pages/staff/feedback/feedback.php'>Đánh giá</a>
                    </div>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='http://localhost/pages/staff/event/event.php'>Sự kiện</a>
                </li>
                <?php
                if (!$logined) {
                ?>
                    <li class='nav-item'>
                        <a class='btn login-btn' href='login.php'>Đăng nhập</a>
                    </li>
                <?php } else {
                ?>
                    <li class='nav-item dropdown d-flex justify-content-center flex-wrap'>
                        <a class='btn user-btn' href='#' id='userDropdown' role='button' data-toggle='dropdown' aria-expanded='false'>
                            <i class='fas fa-user-circle'></i>
                        </a>
                        <div class='text-center' style='width: 100%; font-weight: bold; font-size: .8rem; color: #fff;'>Trần Quốc Việt</div>
                        <div class='dropdown-menu dropdown-menu-right' aria-labelledby='userDropdown'>
                            <a class='dropdown-item' href='#'>Thông tin cá nhân</a>
                            <a class='dropdown-item' href='#'>Đăng xuất</a>
                        </div>
                    </li>
                <?php }
                ?>
            </ul>
        </div>
    </nav>
</div>