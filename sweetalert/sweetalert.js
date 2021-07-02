export const alertas =(texto) => {
	Swal.fire({
		title: 'En Hora Buena',
		html:`<p class="texto">${texto}</p>`,
		icon: 'success',
		confirmButtonText: 'Aceptar',
		footer: 'informacion extra',
		width:'40%',
		height:'100%',
		// padding:
		//background: '#ff6b00',
		customClass: {
		confirmButton: 'btn-success',
		container: 'texto',
		popup: 'cosas',
		icon: 'ico',
		image: 'image',
		content: 'texto',
		confirmButton: 'boton',
		cancelButton: 'popo',
		footer: 'popo',
		title: 'titul'
		},
		backdrop:true,
		// timer:
		// timerProgressBar:
		// toast:
		// position:
		// stopKeydownPropagation:
		// input:
		// inputPlaceholder:
		// inputValue:
		// inputOptions:
		// showConfirmButton:
		// confirmButtonAriaLabel:
		// showCancelButton:
		// cancelButtonText:
		// cancelButtonColor:
		// cancelButtonAriaLabel:
		buttonsStyling:false,
		// showCloseButton:
		// closeButtonAriaLabel:
		imageUrl:'assets/logo_sl.png',
		imageWidth: 80
		// imageHeight:
		// imageAlt:
	});
	
}
