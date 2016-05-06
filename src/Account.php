<?php
/**
 * Created by PhpStorm.
 * User: ezyuskin
 * Date: 05.05.16
 * Time: 15:45
 */

namespace AmaxLab\Templates;

use js\tools\numbers2words\Speller;

/**
 * Class Account
 * @package AmaxLab\Templates
 */
class Account
{
    /**
     * @var string
     */
    private $num;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $template;

    /**
     * @var string
     */
    private $bankName;

    /**
     * @var string
     */
    private $bankBik;

    /**
     * @var string
     */
    private $bankKs;

    /**
     * @var string
     */
    private $bankRs;

    /**
     * @var string
     */
    private $senderName;

    /**
     * @var string
     */
    private $senderInn;

    /**
     * @var string
     */
    private $senderKpp;

    /**
     * @var string
     */
    private $senderAddress;

    /**
     * @var string
     */
    private $senderPhone;

    /**
     * @var string
     */
    private $recipientName;

    /**
     * @var string
     */
    private $recipientInn;

    /**
     * @var string
     */
    private $recipientKpp;

    /**
     * @var string
     */
    private $recipientAddress;

    /**
     * @var string
     */
    private $recipientPhone;

    /**
     * @var string
     */
    private $reason;

    /**
     * @var
     */
    private $signChief;

    /**
     * @var
     */
    private $signAccountant;

    /**
     * @var array
     */
    private $items;

    /**
     * @param string    $num
     * @param \DateTime $date
     * @param string    $template
     */
    public function __construct($num, $date, $template = '')
    {
        $this->num = $num;
        $this->date = $date;
        if (!$template || !file_exists($template)) {
            $this->template = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'account_template.html';
        } else {
            $this->template = $template;
        }
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * @param string $name
     * @param string $bik
     * @param string $ks
     * @param string $rs
     * @return $this
     */
    public function setBank($name, $bik, $ks, $rs)
    {
        $this->bankName = $name;
        $this->bankBik = $bik;
        $this->bankKs = $ks;
        $this->bankRs = $rs;

        return $this;
    }

    /**
     * @param string $name
     * @param string $inn
     * @param string $kpp
     * @param string $address
     * @param string $phone
     * @return $this
     */
    public function setSender($name, $inn, $kpp, $address = '', $phone = '')
    {
        $this->senderName = $name;
        $this->senderInn = $inn;
        $this->senderKpp = $kpp;
        $this->senderAddress = $address;
        $this->senderPhone = $phone;

        return $this;
    }

    /**
     * @param string $name
     * @param string $inn
     * @param string $kpp
     * @param string $address
     * @param string $phone
     * @return $this
     */
    public function setRecipient($name, $inn = '', $kpp = '', $address = '', $phone = '')
    {
        $this->recipientName = $name;
        $this->recipientInn = $inn;
        $this->recipientKpp = $kpp;
        $this->recipientAddress = $address;
        $this->recipientPhone = $phone;

        return $this;
    }

    /**
     * @param string $chief
     * @param string $accountant
     * @return $this
     */
    public function setSign($chief, $accountant)
    {
        $this->signChief = $chief;
        $this->signAccountant = $accountant;

        return $this;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     * @return $this
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * @param string  $name
     * @param integer $count
     * @param string  $unit
     * @param float   $price
     * @return $this
     */
    public function addItem($name, $count, $unit, $price)
    {
        $this->items[] = [
            'name' => $name,
            'count' => intval($count),
            'unit' => $unit,
            'price' => floatval($price),
        ];

        return $this;
    }

    /**
     * @return string
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * @param string $num
     */
    public function setNum($num)
    {
        $this->num = $num;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date->format('d.m.Y');
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @param string $bankName
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
    }

    /**
     * @return string
     */
    public function getBankBik()
    {
        return $this->bankBik;
    }

    /**
     * @param string $bankBik
     */
    public function setBankBik($bankBik)
    {
        $this->bankBik = $bankBik;
    }

    /**
     * @return string
     */
    public function getBankKs()
    {
        return $this->bankKs;
    }

    /**
     * @param string $bankKs
     */
    public function setBankKs($bankKs)
    {
        $this->bankKs = $bankKs;
    }

    /**
     * @return string
     */
    public function getBankRs()
    {
        return $this->bankRs;
    }

    /**
     * @param string $bankRs
     */
    public function setBankRs($bankRs)
    {
        $this->bankRs = $bankRs;
    }

    /**
     * @return string
     */
    public function getSenderName()
    {
        return $this->senderName;
    }

    /**
     * @param string $senderName
     */
    public function setSenderName($senderName)
    {
        $this->senderName = $senderName;
    }

    /**
     * @return string
     */
    public function getSenderInn()
    {
        return $this->senderInn;
    }

    /**
     * @param string $senderInn
     */
    public function setSenderInn($senderInn)
    {
        $this->senderInn = $senderInn;
    }

    /**
     * @return string
     */
    public function getSenderKpp()
    {
        return $this->senderKpp;
    }

    /**
     * @param string $senderKpp
     */
    public function setSenderKpp($senderKpp)
    {
        $this->senderKpp = $senderKpp;
    }

    /**
     * @return string
     */
    public function getSenderAddress()
    {
        return ($this->senderAddress) ? ', '.$this->senderAddress : '';
    }

    /**
     * @param string $senderAddress
     */
    public function setSenderAddress($senderAddress)
    {
        $this->senderAddress = $senderAddress;
    }

    /**
     * @return string
     */
    public function getSenderPhone()
    {
        return ($this->senderPhone) ? ', тел: '.$this->senderPhone : '';
    }

    /**
     * @param string $senderPhone
     */
    public function setSenderPhone($senderPhone)
    {
        $this->senderPhone = $senderPhone;
    }

    /**
     * @return string
     */
    public function getRecipientName()
    {
        return $this->recipientName;
    }

    /**
     * @param string $recipientName
     */
    public function setRecipientName($recipientName)
    {
        $this->recipientName = $recipientName;
    }

    /**
     * @return string
     */
    public function getRecipientInn()
    {
        return ($this->recipientInn) ? ', ИНН: '.$this->recipientInn : '';
    }

    /**
     * @param string $recipientInn
     */
    public function setRecipientInn($recipientInn)
    {
        $this->recipientInn = $recipientInn;
    }

    /**
     * @return string
     */
    public function getRecipientKpp()
    {
        return ($this->recipientKpp) ? ', КПП: '.$this->recipientKpp : '';
    }

    /**
     * @param string $recipientKpp
     */
    public function setRecipientKpp($recipientKpp)
    {
        $this->recipientKpp = $recipientKpp;
    }

    /**
     * @return string
     */
    public function getRecipientAddress()
    {
        return ($this->recipientAddress) ? ', '.$this->recipientAddress : '';
    }

    /**
     * @param string $recipientAddress
     */
    public function setRecipientAddress($recipientAddress)
    {
        $this->recipientAddress = $recipientAddress;
    }

    /**
     * @return string
     */
    public function getRecipientPhone()
    {
        return ($this->recipientPhone) ? ', тел: '.$this->recipientPhone : '';
    }

    /**
     * @param string $recipientPhone
     */
    public function setRecipientPhone($recipientPhone)
    {
        $this->recipientPhone = $recipientPhone;
    }

    /**
     * @return mixed
     */
    public function getSignChief()
    {
        return $this->signChief;
    }

    /**
     * @param mixed $signChief
     */
    public function setSignChief($signChief)
    {
        $this->signChief = $signChief;
    }

    /**
     * @return mixed
     */
    public function getSignAccountant()
    {
        return $this->signAccountant;
    }

    /**
     * @param mixed $signAccountant
     */
    public function setSignAccountant($signAccountant)
    {
        $this->signAccountant = $signAccountant;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        $return = [];

        if (!empty($this->items)) {
            $id = 1;
            foreach ($this->items as $item) {
                $return[] = [
                    'ID' => $id,
                    'NAME' => $item['name'],
                    'COUNT' => $item['count'],
                    'UNIT' => $item['unit'],
                    'PRICE' => number_format($item['price'], 2, ',', ' '),
                    'SUM' => number_format(($item['price'] * $item['count']), 2, ',', ' '),
                ];
                $id ++;
            }
        }

        return $return;
    }

    /**
     * @param array $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return string
     */
    public function getSum()
    {
        $sum = 0;

        if (!empty($this->items)) {
            foreach ($this->items as $item) {
                $sum += $item['count'] * $item['price'];
            }
        }

        return number_format($sum, 2, ',', ' ');
    }

    /**
     * @return string
     */
    public function getSumText()
    {
        $sum = 0;

        if (!empty($this->items)) {
            foreach ($this->items as $item) {
                $sum += $item['count'] * $item['price'];
            }
        }

        return $this->mbUcfirst(Speller::spellCurrency($sum, Speller::LANGUAGE_RUSSIAN, Speller::CURRENCY_RUSSIAN_ROUBLE));
    }

    /**
     * @return int
     */
    public function getItemCount()
    {
        return count($this->items);
    }

    /**
     * @return string
     */
    public function output()
    {
        $content = file_get_contents($this->template);
        $replace = $this->getReplaceArray();

        $templateEngine = new TemplateEngine();
        $content = $templateEngine->process($content, $replace);

        return $content;
    }

    /**
     * @param string $fileName
     * @return int
     */
    public function save($fileName)
    {
        return file_put_contents($fileName, $this->output());
    }

    /**
     * @return array
     */
    private function getReplaceArray()
    {
        $return = [];
        $fields = array_merge(['sum', 'sumText', 'itemCount'], array_keys(get_object_vars($this)));

        foreach ($fields as $field) {
            $method = sprintf('get%s', ucwords($field));
            if (method_exists($this, $method)) {
                $return[strtoupper($field)] = $this->$method();
            }
        }

        return $return;
    }

    /**
     * http://php.net/manual/en/function.ucfirst.php
     * @param string $str
     * @return string
     */
    private function mbUcfirst($str)
    {
        $fc = mb_strtoupper(mb_substr($str, 0, 1, 'UTF-8'), 'UTF-8');

        return $fc.mb_substr($str, 1, null, 'UTF-8');
    }
}
