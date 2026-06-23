<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="お気に入りのコーヒーを記録する、私だけのコーヒー図鑑">
    <title>MYコーヒー図鑑</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <a class="brand" href="index.php" aria-label="MYコーヒー図鑑 トップ">
            <span class="brand-mark" aria-hidden="true"></span>
            <span class="brand-name">MY COFFEE LIBRARY</span>
        </a>
        <p class="header-note">A small record of good coffee.</p>
    </header>

    <main class="page-grid">
        <section class="entry-panel" aria-labelledby="entry-title">
            <div class="section-heading">
                <p class="eyebrow">NEW ENTRY</p>
                <h1 id="entry-title">今日の一杯を記録する</h1>
                <p class="lead">おいしかった記憶を、少しずつ集めていきましょう。</p>
            </div>

            <?php if (($_GET['error'] ?? '') === 'required'): ?>
                <p class="form-error" role="alert">店名と総合評価を入力してください。</p>
            <?php endif; ?>

            <form class="coffee-form" action="write.php" method="post">
                <div class="form-field">
                    <label for="shop">店名 <span class="required-label">必須</span></label>
                    <input id="shop" type="text" name="shop" placeholder="例：清澄ロースタリー" required>
                </div>

                <div class="form-row">
                    <div class="form-field">
                        <label for="date">日付</label>
                        <input id="date" type="date" name="date">
                    </div>
                    <div class="form-field">
                        <label for="price">価格</label>
                        <div class="input-with-unit">
                            <input id="price" type="number" name="price" min="0" step="1" placeholder="600">
                            <span>円</span>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-field">
                        <label for="origin">産地</label>
                        <input id="origin" type="text" name="origin" placeholder="例：Ethiopia">
                    </div>
                    <div class="form-field">
                        <label for="brew">抽出方法</label>
                        <input id="brew" type="text" name="brew" placeholder="例：Pour Over">
                    </div>
                </div>

                <div class="form-field">
                    <label for="notes">テイスティングメモ</label>
                    <textarea id="notes" name="notes" rows="3" placeholder="香りや味わい、その日の気分など"></textarea>
                </div>

                <div class="form-field">
                    <label for="overall">総合評価 <span class="required-label">必須</span></label>
                    <select id="overall" name="overall" required>
                        <option value="">選択してください</option>
                        <option value="5">5 — またすぐ飲みたい</option>
                        <option value="4">4 — とてもおいしい</option>
                        <option value="3">3 — おいしい</option>
                        <option value="2">2 — まずまず</option>
                        <option value="1">1 — 好みと少し違う</option>
                    </select>
                </div>

                <button class="submit-button" type="submit">
                    <span>この一杯を登録</span>
                    <span aria-hidden="true">→</span>
                </button>
            </form>
        </section>

        <section class="list-panel" aria-labelledby="list-title">
            <div class="list-header">
                <div>
                    <p class="eyebrow">COFFEE LOG</p>
                    <h2 id="list-title">これまでの一杯</h2>
                </div>
                <span class="list-caption">MY COLLECTION</span>
            </div>

            <div class="table-shell">
                <?php include 'list.php'; ?>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <small>&copy; Coffee Finder 2026</small>
        <span>BREW · TASTE · REMEMBER</span>
    </footer>
</body>
</html>
