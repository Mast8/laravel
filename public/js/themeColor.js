
let theme = localStorage.getItem('theme')
// console.log(light);

if(theme == null){
	setTheme('blue')
}else{
	setTheme(theme)
}

let themeDots = document.getElementsByClassName('theme-dot')


for (var i=0; themeDots.length > i; i++){
	themeDots[i].addEventListener('click', function(){
		let mode = this.dataset.mode
		console.log('Option clicked:', mode)
		setTheme(mode)
	})
}

function setTheme(mode){
	if(mode == 'light'){
        document.getElementById('theme-style').href = light;
         console.log(document.getElementById('theme-style').href);
	}//else {
        if(mode == 'green'){
            document.getElementById('theme-style').href = green;
            console.log(document.getElementById('theme-style').href);
        }
    //}

	

	if(mode == 'silver'){
		document.getElementById('theme-style').href = silver;
	}

	if(mode == 'blue'){
		document.getElementById('theme-style').href = '';
	}

	localStorage.setItem('theme', mode)
}