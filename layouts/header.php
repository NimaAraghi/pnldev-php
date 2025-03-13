<header>
    <div class="header-right">
        <div class="logo logo-container">
            <a class="logo" href="index.php">
                <img src="assets/images/pnldev.svg">
                <h1>PNLdev</h1>
            </a>
        </div>
        <div class="header-nav">
            <span>آموزش</span>
            <span>مسیریابی</span>
        </div>
    </div>
    <div class="header-left">
        <span onclick="switch_color_mode()" class="dark-light-mode">
            <img src="assets/images/dark-light-mode.png">
            <span id="switch_color" class="light-mode"></span>
        </span>
        <span>فا</span>
        <?php if(isset($_SESSION['user'])): ?>
            <div class="dropdown">
            <span class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-regular fa-user"></i>
            </span>
                <ul class="dropdown-menu">
                        <?php if($_SESSION['user']['role'] == 0): ?>
                            <li><a class="dropdown-item" href="/admin/dashboard.php">داشبورد ادمین</a></li>
                        <?php endif; ?>
                        <li><a class="dropdown-item" href="/dashboard.php">داشبورد</a></li>
                        <li><a class="dropdown-item" href="/logout.php">خروج</a></li>
                </ul>
            </div>
        <?php else: ?>
            <span>
                <a href="/login.php">
                    <i class="fa-regular fa-user"></i>
                </a>
            </span>
        <?php endif; ?>
    </div>
</header>