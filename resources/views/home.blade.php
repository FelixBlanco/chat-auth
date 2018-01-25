@extends('layouts.app')

@section('content')

<div class="container" id="vueChat">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chat-Auth</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-right form-group">
                        <button class="btn btn-primary" v-on:click="newChat()">Nuevo Chat</button>
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item" v-for="listConver in listConvers">
                            <h4>
                                <small>Conversación - </small> 
                                    @{{listConver.created_at}} -  
                                    <button class="btn btn-primary" v-on:click="getChat(listConver.id)">Ver</button>
                            </h4>
                        </li>
                    </ul>

                    <hr>

                    <ul class="list-group">
                        <li class="list-group-item" v-for="infoChat in infoChats">
                            <h4>
                                <small> @{{infoChat.name}} - </small> @{{infoChat.conten}}
                            </h4>
                        </li>
                    </ul>    

                    <div class="form-group">
                        <input type="hidden" :value="conversacion" v-model="conversacion">
                        <input type="text" v-model="mensaje" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" v-on:click="enviarMensaje()">Enviar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


@section('js-vue')
    <script src="{{ asset('js/vue-chat.js') }}"></script>
@endsection

@endsection
