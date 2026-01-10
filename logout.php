<?php
session_start();               // بدء الجلسة
session_destroy();             // تدمير الجلسة بالكامل لتسجيل الخروج الآمن
header("Location: index.php"); // توجيه إلى الصفحة الرئيسية بعد الخروج
exit;                          // إنهاء التنفيذ
