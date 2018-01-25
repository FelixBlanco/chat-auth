new Vue({
    el:'#vueChat',
    created:function(){
        this.getConversacion();
    },
    data:{
        listConvers:[], 
        mensaje:'Escribe el Mensaje', conversacion:'',infoChats:[]
    },
    methods:{
        
        getConversacion:function(){
            axios.get('getConver/').then(response => {
                this.listConvers = response.data;
            })
        },
         newChat:function(){
             //Creamos una Nueva conversacion
             axios.get('newConver').then(response => {
                this.conversacion = response.data.id;
             })
         },


         getChat:function(idConver){
            this.conversacion = idConver;
            axios.get('getChat/'+idConver).then(response => {
                this.infoChats = response.data;
            })
         },
         enviarMensaje:function(){
            axios.post('storeChat',{
                conten  : this.mensaje,
                conversacions_id : this.conversacion
            }).then(response => {
                // Mensaje de Bien y actualizamos la conversacion
                this.getChat(this.conversacion);
            })
         }  

     }
})