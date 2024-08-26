<?php
declare(strict_types=1);
/**
 * MineAdmin is committed to providing solutions for quickly building web applications
 * Please view the LICENSE file that was distributed with this source code,
 * For the full copyright and license information.
 * Thank you very much for using MineAdmin.
 *
 * @Author X.Mo<root@imoi.cn>
 * @Link   https://gitee.com/xmo/MineAdmin
 */

namespace Api\ParkApi\v1\Service;

// use Api\ParkApi\v1\Mapper\IndustrialMapper;
use Mine\Abstracts\AbstractService;

/**
 * 预订申请服务类
 */
class BaoiqiService extends AbstractService
{
    /**
     * @var BaoiqiMapper
     */
    public $mapper;

    public $appCode = 'hzxnyq';
    public $appSecret = 'rgj7GnnXCV1orth1';

    public function __construct(
        // IndustrialMapper $mapper,
    )
    {
        // $this->mapper = $mapper;
    }

    /**
     * 获取申请列表.
     * @return array
     */
    public function getAccessToken($request): string
    {
        $key = env('APP_SECRET');
        $data = $request['accessKey'];
        $param['Access-Key']  = $this->AESencode($data,$key);
        /*$param['Access-App-Code']  = env('APP_CODE');
        $url = env('APP_ACCESSTOKEN_URL');
        print_r($url);
        $ret = curlGetRequest($url,$param);*/

        return $param['Access-Key'];

    }

    public function decrypt($request)
    {
        $key = env('APP_SECRET');
        $data = $request;
        $phone  = $this->aesDecrypt($data,$key);
        return $phone;
    }

    private function aesDecrypt($encryptedData, $key)
    {
        $method = 'AES-128-ECB'; // AES加密算法，ECB模式
        $options = OPENSSL_RAW_DATA; // 使用RAW_DATA选项

        // 检查密钥长度是否为16字节
        if (strlen($key) !== 16) {
            die("Error: Key must be 16 bytes long.");
        }

        // 将加密数据从十六进制转换为二进制格式
        $encryptedData = hex2bin($encryptedData);
        if ($encryptedData === false) {
            die("Error: Invalid hexadecimal encrypted data.");
        }

        // 解密数据
        $decryptedData = openssl_decrypt($encryptedData, $method, $key, $options);

        // 检查解密是否成功
        if ($decryptedData === false) {
            die("Error: Decryption failed.");
        }

        // 移除PKCS5/PKCS7填充
        $pad = ord($decryptedData[strlen($decryptedData) - 1]);
        if ($pad > 0 && $pad <= 16) {
            $decryptedData = substr($decryptedData, 0, -$pad);
        }

        return $decryptedData;
    }


    /**
    * [encrypt aes加密]
    * @param [type] $input [要加密的数据]
    * @param [type] $key [加密key]
    * @return [type] [加密后的数据]
     */
    private function AESencode($data,$key)
    {
        $method = 'AES-128-ECB'; // AES加密算法，ECB模式
        $options = OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING; // 使用RAW_DATA选项，并手动处理填充

        // 检查密钥长度是否为16字节
        if (strlen($key) !== 16) {
            die("Error: Key must be 16 bytes long.");
        }

        // 检查数据长度并手动进行PKCS5/PKCS7填充
        $blockSize = 16;
        $pad = $blockSize - (strlen($data) % $blockSize);
        $data .= str_repeat(chr($pad), $pad);

        // 加密数据
        $encryptedData = openssl_encrypt($data, $method, $key, $options);

        // 返回加密结果（以十六进制形式表示）
        return bin2hex($encryptedData);
    }


}
