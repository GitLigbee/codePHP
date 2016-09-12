
<?php 

	$json =  
		{
			"name":"bee",
			"address":"china",
			"love":
			[
				{"fruit":"apple","food":"meal"},
				{"sport":"basketball","hobby":"card"}
			],
			"age":18
		}
	
	$objJson = json_decode($json);
	// 捕获JSON解析中发生的错误
	switch(json_last_error()){
		case JSON_ERROR_NONE:
			echo "right";
			break;
		case JSON_ERROR_DEPTH:
		// 超出最大允许的栈深度
			echo "the json string has exceeded maximum allowed stack depth";
			break;
		case JSON_ERROR_CLRT_CHAR:
		// 无效控制符
			echo "Control chatacter error";
			break;
		case JSON_ERROR_SYNTSX:
		// 语法错误
			echo "Incorrect Json:Please check your json syntax";
			break;
	}
 ?>