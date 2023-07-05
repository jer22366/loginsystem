<head><link rel="stylesheet" href="{{ asset('css/mainpage.css') }}"></head>
<div id=mainpage>
    <button v-on:click="refresh">更新會員檔案</button>
    <button v-on:click="logout">登出</button>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.7.10/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    
    var mainpage = new Vue({
        el:'#mainpage',
        methods:{
            refresh(){
                window.location ='/refresh';
            },
            logout(){
                sessionStorage.removeItem('key');
                window.location = '/';
            }
        }
    })


</script>