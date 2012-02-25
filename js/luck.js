window.onload = init;
function init() {
var button = document.getElementById("luckButton");
button.onclick = handleButtonClick;
}
function handleButtonClick() {
	var luck = ["Любовта е мъдростта на глупака и безрасъдството на мъдреца!",
	 "Ключът към щастието е ЛЮБОВТА!", 
	 "Глупавите маймуми еволюирали в xора, а умните си седели по дърветата.", 
	 "Всичко се случва по най-добрия за нас начин, просто не го осъзнаваме.",
	 "Една лъжа може да обиколи света, докато истината още си връзва обувките."];
	var rand = Math.floor(Math.random() * luck.length);
	var phrase = luck[rand];
	var phraseElement = document.getElementById("phrase");
	phraseElement.innerHTML = phrase;
	alert("Късметът ти днес: " +phrase);
}
