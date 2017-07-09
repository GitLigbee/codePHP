<?php
mb_internal_encoding('utf-8');
$urlPoster = "http://dev-file.dujiayun.com/images/88/22691/5809104/1487130665/68c038dc20ce4017e9d79436d7dd527d.jpeg";
// $urlPoster = "http://dev-file.dujiayun.com/images/88/22692/5809180/1487150291/d484d29091ebdab5cb57b31049595ef2.jpg";
$urlLogo = './logo.jpg';
$urlQrcode = './qrcode.png';
$imgPoster = generateImage($urlPoster);
$imgLogo = generateImage($urlLogo);
$imgQrcode = generateImage($urlQrcode);

$resizeWidth = 1100;
$resizeHeight = floor($resizeWidth / $imgPoster['width'] * $imgPoster['height']);

// $layout = resize($imgPoster['width'], $imgPoster['height']);
$layout = resize($resizeWidth, $resizeHeight);
// print_r($layout);die;
$imgWhole = imagecreatetruecolor($layout['pic']['width'], $layout['pic']['height']);
$color = imagecolorallocate($imgWhole, 255, 255 ,255);
imagefill($imgWhole, 0, 0, $color);

// imagecopy($imgWhole, $imgPoster['image'], 0, 0, 0, 0, $layout['poster']['width'], $layout['poster']['height']);
imagecopyresampled($imgWhole, $imgPoster['image'], 0 ,0, 0, 0, $layout['poster']['width'], $layout['poster']['width'], $imgPoster['width'], $imgPoster['height']);
imagecopyresampled($imgWhole, $imgLogo['image'], $layout['logo']['point']['x'] ,$layout['logo']['point']['y'], 0, 0, $layout['logo']['width'], $layout['logo']['width'], $imgLogo['width'], $imgLogo['height']);
imagecopyresampled($imgWhole, $imgQrcode['image'], $layout['qrcode']['point']['x'] ,$layout['qrcode']['point']['y'], 0, 0, $layout['qrcode']['width'], $layout['qrcode']['width'], $imgQrcode['width'], $imgQrcode['height']);
//text
$colorFont = imagecolorallocate($imgWhole, 0, 0, 0);
$content = "ligbe我是e\nuu";
imagefttext($imgWhole, $layout['text']['size'], 0, $layout['text']['point']['x'], $layout['text']['point']['y'], $colorFont, 'msyh.ttc', $content);

function resize($width, $height)
{
    $space = array();
    $rate = 0.5;
    $marginLeftRate = 0.05; // 1/20
    $marginTopRate = 0.125; // 1/8
    $logoRate = 0.375; // 3/8
    $qrcodeRate = 0.75; // 6/8
    $wholeWidth = $width;
    $bottomHeight = $height*$rate;
    $wholeHeight = $bottomHeight + $height;
    $marginTop = $bottomHeight*$marginTopRate;
    $marginLeft = $wholeWidth*$marginLeftRate;

    $baseLen = min([$bottomHeight, $wholeWidth*0.5]);

    $logoY = $height + $marginTop;
    $logoX = $marginLeft;
    $logoLen = $bottomHeight*$logoRate;

    $textX = $logoX;
    $textY = $logoY + $logoLen + $marginLeft;
    $textSize = floor($marginTop*0.5);

    $qrcodeLen = $baseLen*$qrcodeRate;
    $qrcodeX = $wholeWidth*0.75 - $qrcodeLen*0.5;
    $qrcodeY = ($bottomHeight - $qrcodeLen) * 0.5 + $height;

    $layout = [
        'pic' => [
            'width' => $wholeWidth,
            'height' => $wholeHeight
        ],
        'poster' => [
            'point' => [
                'x' => 0,
                'y' => 0
            ],
            'width' => $width,
            'height' => $height
        ],
        'logo' => [
            'point' => [
                'x' => $logoX,
                'y' => $logoY
            ],
            'width' => $logoLen,
            'height' => $logoLen
        ],
        'qrcode' => [
            'point' => [
                'x' => $qrcodeX,
                'y' => $qrcodeY
            ],
            'width' => $qrcodeLen,
            'height' => $qrcodeLen
        ],
        'text' => [
            'point' => [
                'x' => $textX,
                'y' => $textY
            ],
            'size' => $textSize
        ]
    ];
    return $layout;
}

function generateImage($url)
{
    list($width, $height, $type) = getimagesize($url);
    switch ($type) {
        case 2 ://jpg jpeg
            $image = imagecreatefromjpeg($url);
            break;
        case 3 ://png
            $image = imagecreatefrompng($url);
            break;
        case 1 ://gif
            $image = imagecreatefromgif($url);
            break;
        default : 
            echo 'no support';die;
    }
    return ['image'=>$image, 'width'=>$width, 'height'=>$height];
}

imagejpeg($imgWhole, time().'.jpg');
imagedestroy($imgPoster['image']);
imagedestroy($imgLogo['image']);
imagedestroy($imgQrcode['image']);
imagedestroy($imgWhole);