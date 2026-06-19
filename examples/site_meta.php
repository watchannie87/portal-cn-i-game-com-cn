<?php

/**
 * 站点元信息定义与简短描述生成器
 *
 * 本文件定义了一个站点元信息容器类，用于存储站点的基本元数据，
 * 并提供一个方法生成简短描述文本。
 */

/**
 * SiteMeta 类封装站点元信息
 */
class SiteMeta
{
    /**
     * @var string 站点名称
     */
    private string $siteName;

    /**
     * @var string 站点标题
     */
    private string $siteTitle;

    /**
     * @var string 站点描述
     */
    private string $siteDescription;

    /**
     * @var string 关键词列表（逗号分隔）
     */
    private string $keywords;

    /**
     * @var string 站点网址
     */
    private string $siteUrl;

    /**
     * @var string 默认语言
     */
    private string $language;

    /**
     * @var string 字符编码
     */
    private string $charset;

    /**
     * @var string 作者/版权信息
     */
    private string $author;

    /**
     * 构造函数
     *
     * @param string $siteName     站点名称
     * @param string $siteTitle    站点标题
     * @param string $siteDescription 站点描述
     * @param string $keywords     关键词列表
     * @param string $siteUrl      站点网址
     * @param string $language     语言
     * @param string $charset      编码
     * @param string $author       作者
     */
    public function __construct(
        string $siteName,
        string $siteTitle,
        string $siteDescription,
        string $keywords,
        string $siteUrl,
        string $language = 'zh-CN',
        string $charset = 'UTF-8',
        string $author = ''
    ) {
        $this->siteName = $siteName;
        $this->siteTitle = $siteTitle;
        $this->siteDescription = $siteDescription;
        $this->keywords = $keywords;
        $this->siteUrl = $siteUrl;
        $this->language = $language;
        $this->charset = $charset;
        $this->author = $author;
    }

    /**
     * 生成站点简短描述文本
     *
     * 描述格式：站点名称 - 站点标题：站点描述。关键词：关键词列表
     *
     * @return string HTML 安全的描述文本
     */
    public function generateShortDescription(): string
    {
        $parts = [
            htmlspecialchars($this->siteName, ENT_QUOTES | ENT_HTML5, $this->charset),
            ' - ',
            htmlspecialchars($this->siteTitle, ENT_QUOTES | ENT_HTML5, $this->charset),
            '：',
            htmlspecialchars($this->siteDescription, ENT_QUOTES | ENT_HTML5, $this->charset),
        ];

        if (!empty($this->keywords)) {
            $parts[] = '。关键词：';
            $parts[] = htmlspecialchars($this->keywords, ENT_QUOTES | ENT_HTML5, $this->charset);
        }

        return implode('', $parts);
    }

    /**
     * 获取站点名称
     *
     * @return string
     */
    public function getSiteName(): string
    {
        return $this->siteName;
    }

    /**
     * 获取站点标题
     *
     * @return string
     */
    public function getSiteTitle(): string
    {
        return $this->siteTitle;
    }

    /**
     * 获取站点描述
     *
     * @return string
     */
    public function getSiteDescription(): string
    {
        return $this->siteDescription;
    }

    /**
     * 获取关键词列表（原始字符串）
     *
     * @return string
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }

    /**
     * 获取站点网址
     *
     * @return string
     */
    public function getSiteUrl(): string
    {
        return $this->siteUrl;
    }

    /**
     * 以数组形式返回所有元信息
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'siteName'        => $this->siteName,
            'siteTitle'       => $this->siteTitle,
            'siteDescription' => $this->siteDescription,
            'keywords'        => $this->keywords,
            'siteUrl'         => $this->siteUrl,
            'language'        => $this->language,
            'charset'         => $this->charset,
            'author'          => $this->author,
        ];
    }
}

// 示例数据：爱游戏站点
$meta = new SiteMeta(
    '爱游戏',
    'AiGame Portal',
    '汇聚精彩游戏资讯，提供丰富游戏内容',
    '爱游戏, 游戏, 资讯, 娱乐',
    'https://portal-cn-i-game.com.cn',
    'zh-CN',
    'UTF-8',
    'AiGame Team'
);

// 输出简短描述
echo $meta->generateShortDescription() . "\n";

// 输出完整元信息（测试用）
print_r($meta->toArray());