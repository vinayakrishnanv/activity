 <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['useragent'] = "CodeIgniter";
// $config['protocol'] = "ssmtp";
$config['_smtp_auth']   = TRUE;
// $config['smtp_host'] = "ssl://ssmtp.gmail.com";
// $config['smtp_user'] = "info@atomwellness.com";
// $config['smtp_pass'] = "jgwguaqczprohwrl";
$config['protocol']	= 'smtp';
$config['smtp_port']	= '587';
$config['smtp_host']	= 'smtp.sendgrid.net';
$config['smtp_user']	= 'atomwellness';
$config['smtp_pass']	= 'Kunju1234!';
// $config['smtp_port'] = 465;
$config['wordwrap'] = TRUE;
$config['wrapchars'] = 76;
$config['mailtype'] = "html";
$config['charset'] = "utf-8";
$config['validate'] = FALSE;
$config['priority'] = 3;
$config['crlf'] = "\r\n";
$config['newline'] = "\r\n";
$config['bcc_batch_mode'] = TRUE;
$config['bcc_batch_size'] = "200";
/* End of file config.php */
/* Location: ./application/config/config.php */
?>