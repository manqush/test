        <!-- first navbar -->
        <nav class="bg-dark p-3">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-6">
                        <h1 class="h3 text-white">قاعة الاختبارات</h1>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col text-end">
                                <span class="text-white">مرحبا</span>
                                <span class="text-white me-3"><?php echo getSession('username');?></span>
                                <a class="text-decoration-none" href="logout.php">تسجيل الخروج</a>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            </div>
            </div>
        </nav>
        <!-- sound navbar -->
        <nav class="bg-white  shadow-sm">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">الاختبارات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="archive.php">الارشيف</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>