<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2013
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @package   Bee4\UserAgentClassify\Bots
 */

namespace Bee4\UserAgentClassify\Bots;

use InvalidArgumentException;

/**
 * Class Baidu
 * Detect if a visit is a Baidu one
 * @package Bee4\UserAgentClassify\Bots
 */
class Baidu extends AbstractBot
{
    /**
     * Baidu bot constructor
     * @param string $useragent The useragent used for detection
     * @throws InvalidArgumentException
     */
    public function __construct($useragent)
    {
        //Baidu Spider (search bot): http://www.botopedia.org/user-agent-list/search-bots/baidu-spider.html
        /**
         * Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search
         * Mozilla/5.0 (Linux;u;Android 2.3.7;zh-cn;) AppleWebKit/533.1 (KHTML,like Gecko) Version/4.0 Mobile Safari/533.1 (compatible; +http://www.baidu.com/search/spider.html)
         * Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.2.8;baidu Transcoder) Gecko/20100722 Firefox/3.6.8 ( .NET CLR 3.5.30729)
         * Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; baidu Transcoder;)
         * Baiduspider-image+(+http://www.baidu.com/search/spider.htm)
         * Baiduspider+(+http://www.baidu.com/search/spider.htm)
         * Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)
         *
         * Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; BaiduGame)
         */
        if (strpos($useragent, 'Baiduspider-image') !== false) {
            $this->setName('baidu-image');
            $this->addTags(['search','image']);
        } elseif (strpos($useragent, 'BaiduGame') !== false) {
            $this->setName('baidu-game');
            $this->addTags(['search','game']);
        } elseif (strpos($useragent, 'Baiduspider') !== false || strpos($useragent, 'baidu') !== false) {
            $this->setName('baidu-spider');
            $this->addTags(['search']);
        } else {
            throw new InvalidArgumentException('UserAgent given is not a valid Baidu one: ' . $useragent);
        }
    }
}
