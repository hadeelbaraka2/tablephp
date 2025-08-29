<?php
//رابط الملف على GitHub 
//https://github.com/hadeelbaraka2/tablephp/edit/main/array.php
$students = [
    [
        'stdNo' => '20003',
        'stdName' => 'Ahmed Ali',
        'stdEmail' => 'ahmed@gmail.com',
        'stdGAP' => 88.7
    ],
    [
        'stdNo' => '30304',
        'stdName' => 'Mona Khalid',
        'stdEmail' => 'mona@gmail.com',
        'stdGAP' => 78.5
    ],
    [
        'stdNo' => '10002',
        'stdName' => 'Bilal Hmaza',
        'stdEmail' => 'bilal@gmail.com',
        'stdGAP' => 98.7
    ],
    [
        'stdNo' => '10005',
        'stdName' => 'Said Ali',
        'stdEmail' => 'said@gmail.com',
        'stdGAP' => 98.7
    ],
    [
        'stdNo' => '10007',
        'stdName' => 'Mohammed ahmed',
        'stdEmail' => 'mohamed@gmail.com',
        'stdGAP' => 98.7
    ]
];
$total = count($students);
// لون الـ GAP حسب المعدل
function gpaBadge($g){
  if($g>=90) return "bg-success";       // ممتاز
  if($g>=80) return "bg-primary";       // جيد جدا
  if($g>=70) return "bg-info text-dark"; // جيد
  if($g>=60) return "bg-warning text-dark"; // مقبول
  return "bg-danger";                   // ضعيف
}

?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>تقرير الطلاب</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{background:#f9f9fb}
    .print-btn{position:sticky; top:10px; z-index:999}
    @media print {
      .no-print { display: none !important; }
      body { background: white; }
    }
  </style>
</head>
<body>
<div class="container py-4">

  <!-- عنوان + زر الطباعة -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">تقرير الطلاب</h2>
    <button onclick="window.print()" class="btn btn-outline-dark no-print print-btn">
      🖨️ طباعة التقرير
    </button>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>رقم الطالب</th>
              <th>اسم الطالب</th>
              <th>البريد الإلكتروني</th>
              <th>GAP</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($students as $i=>$s): ?>
            <tr>
              <td><?php echo $i+1; ?></td>
              <td><?php echo $s['stdNo']; ?></td>
              <td><?php echo htmlspecialchars($s['stdName']); ?></td>
              <td><a href="mailto:<?php echo $s['stdEmail']; ?>"><?php echo $s['stdEmail']; ?></a></td>
              <td>
                <span class="badge <?php echo gpaBadge($s['stdGAP']); ?> fs-6 px-3">
                  <?php echo number_format($s['stdGAP'],1); ?>
                </span>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="4" class="text-end">إجمالي عدد الطلاب</th>
              <th><?php echo $total; ?></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>

