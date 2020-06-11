document.querySelector("#VerMiPerfil").addEventListener("click",function(){
    crearQuery();
    });
    
    
    function crearQuery(){
        let rut = getAttribute("value");
        //document.querySelector('#rutquery').value;
        console.log(rut);
        creatquery = {};
        creatquery.rut = rut;
        let formdata = new FormData();
        formdata.append("rut", creatquery.rut);
        crearQuery(formdata).then(response=>{
            console.log(response);
        })
    }
    crearQuery = async(formdata) =>{
        const response = await axios.post("api/experiencia/queryExperiencia.php", formdata);
        return await response.data;
    }
    0

$().ready(function(){  
    $("#NewPublication").modal("show");  
}); 