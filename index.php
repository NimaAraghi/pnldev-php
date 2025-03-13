<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include "layouts/link.php"; ?>
        <link rel="stylesheet" href="styles/index.css">
        <title>index</title>
    </head>
    <body>
        <?php include "layouts/header.php" ?>

        <main>

            <div class="road-map">
                <div class="top">
                    <h1>از کجا شروع کنم؟</h1>
                    <div class="road road-top">
                        <div class="dashed-line"></div>
                    </div>
                </div>
                <div class="middle">
                    <div class="road">
                        <div class="trex">
                            <img src="assets/images/trex-driver.gif" alt="">
                        </div>
                        <div class="dashed-line"></div>
                    </div>
                </div>
                <div class="bottom">
                    <nav>
                        <ul>
                            <li><a href="#">توسعه وب</a></li>
                            <li><a href="#">بک اند</a></li>
                            <li><a href="#">فرانت اند</a></li>
                            <li><a href="#">اندروید</a></li>
                        </ul>
                    </nav>
                </div>
            </div> <!-- road map -->

            <div class="content">
                <div class="title">
                    <div class="right">
                        <div class="cactus"></div>
                    </div>
                    <h2>آموزش ها</h2>
                    <div class="left">
                        <div class="trex-small"></div>
                    </div>
                </div>

                <div class="box-container">
                    <div class="box">
                        <div class="box-title">
                            <h2>HTML</h2>
                            <img src="assets/images/html.png" alt="">
                        </div>
                        <div class="line">
                            <div class="trex-small box-bg"></div>
                        </div>
                        <div class="description">اولین قدم برای ساخت یک وبسایت، یادگیری زبان html است. مسیر یادگیری html
                            بسیار ساده است ، پس در این مسیر کوتاه با ما همراه باش!</div>
                        <div class="link">
                            <a href="#">آموزش</a>
                            <a href="#">مرجع</a>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-title">
                            <h2>CSS</h2>
                            <img src="assets/images/css.png" alt="">
                        </div>
                        <div class="line">
                            <div class="trex-small box-bg"></div>
                        </div>
                        <div class="description">آیا تا بحال دوست داشتی یک سایت زیبا داشته باشی ؟برای اینکار باید زبان css
                            را یاد بگیری زبان css یک زبان بسیار دوست داشتنی است و با آن می توانیم کلی کار های جذاب کنیم.
                        </div>
                        <div class="link">
                            <a href="#">آموزش</a>
                            <a href="#">مرجع</a>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-title">
                            <h2>JS</h2>
                            <img src="assets/images/js.png" alt="">
                        </div>
                        <div class="line">
                            <div class="trex-small box-bg"></div>
                        </div>
                        <div class="description">جاوااسکریپت یکی از زبان‌های اصلی برنامه نویسی وب است که در کنار HTML و CSS
                            برای ساخت صفحات وب تعاملی و واکنش‌گرااستفاده می شود.جاوااسکریپت زبانی سطح بالا ،داینامیک و مبتنی
                            بر شیء است.</div>
                        <div class="link">
                            <a href="#">آموزش</a>
                            <a href="#">مرجع</a>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-title">
                            <h2>JQuery</h2>
                            <img src="assets/images/jquery.png" alt="">
                        </div>
                        <div class="line">
                            <div class="trex-small box-bg"></div>
                        </div>
                        <div class="description">jQuery یک کتابخانه سبک وزن برای جاوا اسکریپت است. این یعنی با حجم کد کمتر
                            نسبت به جاوا اسکریپت، بیشترین کار را انجام می‌دهد. شاید کارهایی که در جاوا اسکریپت نیاز به چندین
                            خط کدنویسی دارد، در جی کوئری تنها در یک خط انجام شود!</div>
                        <div class="link">
                            <a href="#">آموزش</a>
                            <a href="#">مرجع</a>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-title">
                            <h2>PHP</h2>
                            <img src="assets/images/php.png" alt="">
                        </div>
                        <div class="line">
                            <div class="trex-small box-bg"></div>
                        </div>
                        <div class="description">پی اچ پی یک زبان برنامه نویسی شئ گرا میباشد که پایه و اساس آن توسعه صفحه
                            های وب است .کد های php تحت نظر سرور که نرم افزار های ان روی سیستم نصب باشد اجرا می‌شود.</div>
                        <div class="link">
                            <a href="#">آموزش</a>
                            <a href="#">مرجع</a>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-title">
                            <h2>C</h2>
                            <img src="assets/images/c.png" alt="">
                        </div>
                        <div class="line">
                            <div class="trex-small box-bg"></div>
                        </div>
                        <div class="description">زبان برنامه‌نویسی C یک زبان برنامه‌نویسی سطح بالا است که برای توسعه
                            نرم‌افزارهای سیستمی و برنامه‌های کاربردی استفاده می‌شود. در زبان C، برنامه‌ها به صورت سطر به سطر
                            اجرا می‌شوند و دارای دستورات و توابعی هستند که توسط کامپایلر به زبان ماشین ترجمه می‌شوند. به طور
                            خلاصه، در زبان C می‌توانید متغیرها، عملگرها، شرط‌ها، حلقه‌ها و توابع را تعریف و استفاده کنید.
                        </div>
                        <div class="link">
                            <a href="#">آموزش</a>
                            <a href="#">مرجع</a>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-title">
                            <h2>++C</h2>
                            <img src="assets/images/c++.png" alt="">
                        </div>
                        <div class="line">
                            <div class="trex-small box-bg"></div>
                        </div>
                        <div class="description">سی پلاس پلاس یک زبان چند منظوره، شی گرا و سطح میانی است. سی پلاس پلاس یکی
                            از پرتقاضاترین زبان برنامه نویسی است که تاریخچه آن به بیش از ۴۰ سال پیش باز می گردد و همچنان
                            محبوبیت خود را حفظ کرده.بیشترین کاربرد این زبان در حوزه دسکتاپ و بازی سازی است.</div>
                        <div class="link">
                            <a href="#">آموزش</a>
                            <a href="#">مرجع</a>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-title">
                            <h2>Python</h2>
                            <img src="assets/images/python.png" alt="">
                        </div>
                        <div class="line">
                            <div class="trex-small box-bg"></div>
                        </div>
                        <div class="description">پایتون یک زبان برنامه نویسی سطح بالا و دارای پویایی بسیار بالا است. این
                            زبان برنامه نویسی برای کاربردهای گوناگونی از جمله توسعه وب، علوم داده، هوش مصنوعی، برنامه نویسی
                            شبکه و... استفاده می‌شود.</div>
                        <div class="link">
                            <a href="#">آموزش</a>
                            <a href="#">مرجع</a>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-title">
                            <h2>Linux</h2>
                            <img src="assets/images/linux.png" alt="">
                        </div>
                        <div class="line">
                            <div class="trex-small box-bg"></div>
                        </div>
                        <div class="description">لینوکس یک خانواده از سیستم عامل های مشابه یونیکس و اوپن سورس است که بر پایه
                            هسته سیستم عامل لینوکس منتشر شده است. لینوکس به طور معمول در توزیع های لینوکس بسته بندی می شود.
                            توزیع ها شامل هسته لینوکس و پشتیبانی از نرم افزار سیستم و کتابخانه ها، که بسیاری از آنها توسط
                            پروژه GNU ارائه شده است.</div>
                        <div class="link">
                            <a href="#">آموزش</a>
                            <a href="#">مرجع</a>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-title">
                            <h2>MySQL</h2>
                            <img src="assets/images/mysql.png" alt="">
                        </div>
                        <div class="line">
                            <div class="trex-small box-bg"></div>
                        </div>
                        <div class="description">SQL یک زبان برنامه نویسی که برای مدیریت داده ها در پایگاه داده به کار می
                            رود. این زبان شامل دستورات مختلفی مانند جستجو، اضافه کردن، ویرایش و حذف اطلاعات در پایگاه داده
                            می باشد.</div>
                        <div class="link">
                            <a href="#">آموزش</a>
                            <a href="#">مرجع</a>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-title">
                            <h2>NumPy</h2>
                            <img src="assets/images/numpy.png" alt="">
                        </div>
                        <div class="line">
                            <div class="trex-small box-bg"></div>
                        </div>
                        <div class="description">نامپای (NumPy) یک کتابخانه محبوب پایتونی برای محاسبات علمی است که پشتیبانی
                            از آرایه‌های چندبعدی بزرگ و عملکردهای ریاضی پیشرفته را فراهم می‌کند. این کتابخانه بهینه‌سازی شده
                            و بسیار سریع است، و به عنوان پایه‌ای برای بسیاری از کتابخانه‌های دیگر مانند SciPy و Pandas
                            استفاده می‌شود.</div>
                        <div class="link">
                            <a href="#">آموزش</a>
                            <a href="#">مرجع</a>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-title">
                            <h2>Pandas</h2>
                            <img src="assets/images/pandas.png" alt="">
                        </div>
                        <div class="line">
                            <div class="trex-small box-bg"></div>
                        </div>
                        <div class="description">پانداز (Pandas) یک کتابخانه پایتونی برای تحلیل و مدیریت داده‌هاست که
                            ساختارهای داده‌ای مانند DataFrame و Series را فراهم می‌کند. این کتابخانه ابزارهایی قدرتمند برای
                            خواندن، نوشتن، فیلتر کردن، گروه‌بندی و دستکاری داده‌ها از منابع مختلف مانند فایل‌های CSV، اکسل و
                            پایگاه‌های داده ارائه می‌دهد.</div>
                        <div class="link">
                            <a href="#">آموزش</a>
                            <a href="#">مرجع</a>
                        </div>
                    </div>
                </div> <!-- content -->

                <div class="progress">
                    <h2>پیشرفت خود را ببینید</h2>
                    <p>در بخش پنل کاربری می توانید پیشرفت خود را ببینید و روند آموزش خود را مدیریت کنید.</p>
                    <img src="assets/images/progressive.png" alt="">
                    <div class="progress-btn">
                        عضویت رایگان
                    </div>
                </div>
            </div>

        </main>

        <?php include "layouts/footer.php" ?>
        
        <?php include "layouts/script.php" ?>
    </body>
</html>