<?php
// 站点元信息管理：爱游戏体育 项目基础描述生成

$siteMeta = [
    'name'        => '爱游戏体育',
    'domain'      => 'https://panel-aigames.com',
    'language'    => 'zh-CN',
    'keywords'    => ['爱游戏体育', '在线体育', '体育赛事', '游戏竞技'],
    'author'      => 'Meta Team',
    'version'     => '1.0.0',
    'description' => '爱游戏体育为您提供丰富的体育赛事与游戏竞技资讯。',
    'short_desc'  => '',
];

/**
 * 根据站点元数据生成简短描述文本
 *
 * @param array $meta 站点元信息数组
 * @param int $maxLength 最大字符长度（中文按1字符计）
 * @return string 生成的描述文本
 */
function generateShortDescription(array $meta, int $maxLength = 80): string
{
    $parts = [];

    if (!empty($meta['name'])) {
        $parts[] = $meta['name'];
    }

    if (!empty($meta['description'])) {
        $parts[] = $meta['description'];
    }

    if (!empty($meta['domain'])) {
        $parts[] = '官网：' . $meta['domain'];
    }

    $text = implode(' — ', $parts);

    // 如果超出最大长度，截断并添加省略号
    if (mb_strlen($text, 'UTF-8') > $maxLength) {
        $text = mb_substr($text, 0, $maxLength - 3, 'UTF-8') . '...';
    }

    return $text;
}

// 生成描述
$siteMeta['short_desc'] = generateShortDescription($siteMeta);

// 简单展示（非HTML输出，仅用于CLI或日志）
echo "站点名称: " . $siteMeta['name'] . "\n";
echo "域名: " . $siteMeta['domain'] . "\n";
echo "简短描述: " . $siteMeta['short_desc'] . "\n";

// 如果需要HTML安全输出（用于网页），可调用此函数
function safeDescriptionForHtml(array $meta): string
{
    $raw = $meta['short_desc'] ?? '';
    return htmlspecialchars($raw, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

// 示例：安全输出
$htmlSafeDesc = safeDescriptionForHtml($siteMeta);
echo "HTML安全描述: " . $htmlSafeDesc . "\n";