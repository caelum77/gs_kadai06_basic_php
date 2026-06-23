<?php

$rows = [];
$file = fopen('./data/data.csv', 'r');

if ($file !== false) {
    while (($row = fgetcsv($file)) !== false) {
        $rows[] = array_pad($row, 7, '');
    }
    fclose($file);
}
?>

<?php if (count($rows) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>店名</th>
                <th>日付</th>
                <th>産地</th>
                <th>抽出方法</th>
                <th>価格</th>
                <th>メモ</th>
                <th>評価</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (array_reverse($rows) as $row): ?>
                <tr>
                    <td class="shop-cell"><?= htmlspecialchars($row[0], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row[1], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row[2], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row[3], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row[4], ENT_QUOTES, 'UTF-8') ?><?= $row[4] !== '' ? '円' : '' ?></td>
                    <td class="notes-cell"><?= htmlspecialchars($row[5], ENT_QUOTES, 'UTF-8') ?></td>
                    <td class="rating-cell">
                        <?php $ratingValue = is_numeric($row[6]) ? max(0, min(5, (int) $row[6])) : 0; ?>
                        <?php if ($ratingValue > 0): ?>
                            <span class="bean-rating" aria-label="5段階評価で<?= $ratingValue ?>">
                                <?php for ($i = 0; $i < $ratingValue; $i++): ?>
                                    <span class="brand-mark rating-bean" aria-hidden="true"></span>
                                <?php endfor; ?>
                            </span>
                        <?php else: ?>
                            <span class="empty-value">—</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="empty-state">
        <span class="empty-state-mark" aria-hidden="true"></span>
        <p>まだ記録がありません。</p>
        <small>最初の一杯を左のフォームから登録してください。</small>
    </div>
<?php endif; ?>
