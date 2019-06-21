<?php
namespace app\index\controller;

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use think\Db;
use think\Env;
use think\Response;

class Index
{
    public function index()
    {
        $data = [
            'product_name'  => 'sutu能量棒',
            'color'         => '蓝色',
            'taste'         => '薄荷冰',
            'production_time'   => strtotime('2019-06-1'),
            'production_no'     => create_sequence().generateRandomString(),
            'shipping_time'     => strtotime('2019-06-4'),
            'sale_time'         => strtotime('2019-06-20'),
            'scan_count'        => 0,
            'create_time'       => strtotime('2019-06-1'),
        ];
        Db::table('product')->insert($data);

        $qrCode = new QrCode($data['production_no']);
        // Set advanced options
        $qrCode->setWriterByName('png');
        $qrCode->setMargin(10);
        $qrCode->setEncoding('UTF-8');
        $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
        $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
        // $qrCode->setLabel('Scan the code', 16, __DIR__ . '/../assets/fonts/noto_sans.otf', LabelAlignment::CENTER);
        // $qrCode->setLogoPath(__DIR__ . '/../assets/images/symfony.png');
        $qrCode->setLogoSize(150, 200);
        $qrCode->setRoundBlockSize(true);
        $qrCode->setValidateResult(false);
        $qrCode->setWriterOptions(['exclude_xml_declaration' => true]);
        // Directly output the QR code
        //header('Content-Type: ' . $qrCode->getContentType());
        $qrCode->writeFile(Env::get('app_path').'/qrcode' . $data['production_no'] . '.png');

    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
