<?php
require_once "conn.php";

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password) or die('Cannot connect');

// TODO: Get the user id from session
$user_id = 0;

if (!isset($_GET['filter']))
    $stmt = $conn->prepare('select * from issues');
else if ($_GET['filter'] === 'open')
    $stmt = $conn->prepare("select * from issues where status = 'OPEN'");
else
    $stmt = $conn->prepare("select * from issues where assigned_to = 0");

$stmt->execute();
$issues = $stmt->fetchAll(PDO::FETCH_ASSOC);
$conn = null;

$status_class_map = [];
$status_class_map['OPEN'] = 'status-open';
$status_class_map['CLOSED'] = 'status-closed';
$status_class_map['INPROGRESS'] = 'status-inprogress';
?>


<tr class="table-header">
    <th>Title</th>
    <th>Type</th>
    <th> Status </th>
    <th> Assinged To</th>
    <th>Created</th>
</tr>
<?php foreach ($issues as $issue) : ?>
    <tr>
        <td><span>#<?= $issue['id']; ?></span> <a href="./issuedetails.php?id=<?= $issue['id']; ?>"> <?= $issue['title']; ?> </a> </td>
        <td><?= $issue['_type']; ?></td>
        <td class="status-label"> <span class="status <?= $status_class_map[$issue['_status']]; ?>"> <?= $issue['_status']; ?> <span> </td>
        <td> <?= $issue['assigned_to']; ?> </td>
        <td> <?= $issue['created']; ?></td>
    </tr>
<?php endforeach; ?>