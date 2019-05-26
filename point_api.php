<?php
/**
 * -----VKPoint_api------
 * @by Artem Kruchinin (vk.com/tkruchinin)
 * @version 1.0
 */
class VKPoint_api{


	private $token = "";
	private $user_id = '';

	/**
	 * Конструктор
	 * 
	 * @param int $user_id ID пользователя, который получил токен
	 * @param string $token Токен
	 */
	public function __construct(int $user_id, string $token) {
		$this->user_id = $user_id;
		$this->token = $token;
	}
	
	private function request(string $method, string $body) {
	    
	}
	
	/*
	    * @Перевод VK Point с аккаунта на другой аккаунт. 
		* @param int $user_id - id пользователя кому переводим
		* @param int $point - сумма перевода
	*/
	public function MerchantSend($user_id, $point){
$user_id_to = $this->user_id; // id отправителя

$user_id = $user_id; // Кому отправляем

$point = $point; // Сколько отправляем

$access_token = $this->token; // Токен

$request = file_get_contents("https://vkpoint.vposter.ru/api/method/account.MerchantSend?user_id_to=".$user_id_to."&user_id=".$user_id."&point=".$point."&access_token=".$access_token);


$json_request = json_decode($request);

	return $json_request;

	}
	
		/*
	    * @Регистрация CallBackAPI point (На указанный адрес будут отправляться уведомления о новых переводах. Чтобы удалить адрес передайте в параметре callback значение null.) 
		* @param string $callback_url - Адрес на который будет отправляться POST
	*/
		public function setCallBackAPI($callback_url){
		    
		    $user_id = $this->user_id; // Ваш id

$callback_url = $callback_url; // Адрес на который будет отправляться POST

$access_token = $this->token; // Ваш access_token 


$request = file_get_contents("https://vkpoint.vposter.ru/api/method/account.changeSettings?user_id=".$user_id."&callback=".$callback_url."&access_token=".$access_token);


$json_request = json_decode($request);

  return $json_request;


		}
		/*
		 * @Вывод истории переводов пользователя.
		 * @param int $user_id - id пользователя чью историю выводим
		*/
		public function HistoryTransactions($user_id){
		    


$options = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n" .
              "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n"
  )
);


$context = stream_context_create($options);


$request = file_get_contents("https://vkpoint.vposter.ru/api/method/users.HistoryTransactions?user_id=".$user_id, false, $context);


$json_request = json_decode($request);
return $json_request;
		    
		}
		
		/*
		 * @Вывод данных пользователя.
		 * @param int $user_id - id пользователя чью историю выводим
		*/
		public function getPoint($user_id){


$options = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n" .
              "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n"
  )
);


$context = stream_context_create($options);


$request = file_get_contents("https://vkpoint.vposter.ru/api/method/account.getPoint?user_id=".$user_id, false, $context);


$json_request = json_decode($request);
return $json_request;
		}
		
		/*
		 * @Вывод общего топа пользователей.
		 * @param int $count - количество выводимых пользователей
		*/
		public function getTop($count){


$options = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n" .
              "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n"
  )
);


$context = stream_context_create($options);


$request = file_get_contents("https://vkpoint.vposter.ru/api/method/users.getTop?count=".$count, false, $context);


$json_request = json_decode($request);
return $json_request;
		}
		
		/*
		 * @Аналогичен методу getPoint, только можно вывести информацию о нескольких пользователях одним запросом.
		 * @param string $user_ids — id пользователей через запятую (Пример: $user_ids = '1,2,3,4,5'; )
		*/
		public function getTopIds($user_ids){


$options = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n" .
              "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n"
  )
);


$context = stream_context_create($options);


$request = file_get_contents("https://vkpoint.vposter.ru/api/method/users.getTopIds?user_ids=".$user_ids, false, $context);


$json_request = json_decode($request);
return $json_request;
		}
		
		/*
		 * @Вывод общего топа VIP пользователей.
		 * @param int $count — количество выводимых пользователей
		*/
		public function getTopVip($count){

$options = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n" .
              "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n"
  )
);

$context = stream_context_create($options);

$request = file_get_contents("https://vkpoint.vposter.ru/api/method/users.getTopVip?count=".$count, false, $context);

$json_request = json_decode($request);
return $json_request;
		}
		
		/*
		 * @Вывод списка игр.
		*/
		public function getByld(){
		    $options = array(

  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n" .
              "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n"
  )
);

  

$context = stream_context_create($options);


$request = file_get_contents("https://vkpoint.vposter.ru/api/method/games.getByld", false, $context);


$json_request = json_decode($request);
return $json_request;
		}
		
		/*
		 * @Поиск по пользователям.
		 * @param string $search — Запрос на поиск
		 * @param int $count — Максимальное выводимое кол-во пользователей в поиске
		*/
		public function getTopVip($search,$count){
		    $options = array(

  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n" .
              "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n"
  )
);

  

$context = stream_context_create($options);


$request = file_get_contents("https://vkpoint.vposter.ru/api/method/users.search?search=".$search."&count=".$count, false, $context);


$json_request = json_decode($request);
return $json_request;
		}
		
				/*
		 * @Поиск по пользователям.
		 * @param int $count — Максимальное выводимое кол-во уведомлений
		*/
		public function notif($count){
		    $options = array(

  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n" .
              "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n"
  )
);

$context = stream_context_create($options);

$request = file_get_contents("https://vkpoint.vposter.ru/api/method/app.notif?count=".$count, false, $context);

$json_request = json_decode($request);
return $json_request;
		}
	
}
	
	?>