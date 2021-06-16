
export const ajax = ({ url, method, cbSuccess, data}) => {

    fetch(url,{
        method,
        headers: {
            'Content-type': 'aplication/json',
            'enc-type': 'multipart/form-data',
        },
        body: JSON.stringify(data),
    })
      .then( res => res.ok ? res.json() : Promise.reject(res))
      .then( ( data ) => cbSuccess( data) )
      .catch( error => {
        let message = error.statusText || 'ocurrio un error';
        alert( message);
        console.error(error);
      });
}

// export default ajax;
