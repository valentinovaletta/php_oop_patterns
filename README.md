Telegram callback message example:

{
	"var1":"TelegramCode",
	"update_id":"234234234",
	"message":{
		"message_id" : 12,
		"from" : {
			"id" : "123123123",
			"is_bot" : "",
			"first_name" : "Well",
			"username" : "well_wellwell",
			"language_code" : "ru"
		},
		"chat" : {
			"id" : "123123123",
			"first_name" : "Well",
			"username" : "well_wellwell",
			"type" : "private"
		},
		"date" : 1731662009,
		"text" : "/start",
		"entities" : {
			"0" : {
				"offset" : 0,
				"length" : 6,
				"type" : "bot_command"
			}
		}
	}
}