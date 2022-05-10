<template>
  <Head title="Welcome" />
    <div class="min-h-screen" id="app">
        <header class="flex justify-between">
            <div class="ml-20 mt-5 font-mono font-bold text-3xl"><span class="text-red-500">AMERICA</span><span class="text-indigo-500">GREA</span></div>
            
            <div v-if="canLogin" class="mr-10 px-6 py-4 sm:block text-indigo-600">
                <Link v-if="$page.props.user" :href="route('inicio')" class="text-sm  underline">
                    Inicio
                </Link>

            </div>
              
        </header>
        <section class="w-full flex flex-row  ">
            <div class="w-1/2 font-mono flex flex-col justify-center items-center">
                <div class="w-4/5">
                    <div class="">
                        <p class="font-semibold text-3xl mb-8">Hola!____________</p>
                        <p class="font-bold text-5xl mb-6">Bienvenido a la Pagina de la Gerencia Regional</p>
                    
                    </div>
                    <div class="inline-block">
                        <button type="button"
                            class="focus:outline-none text-white text-xl py-2.5 px-5 rounded-md bg-gradient-to-r from-indigo-600 to-blue-600 transform hover:scale-110">
                            <Link href="/login"> Ingresar</Link>
                        </button>
                        
                    </div>
                </div>
            </div>
            
            <div class="w-1/2 pt-16 flex flex-col justify-center">
                <!--
                <img class="w-4/5 p-10" url="storage\app\public\index\index.png">-->
            </div>
        </section>
    </div>
</template>


<script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";


export default defineComponent({
  components: {
    Head,
    Link,
  },

  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },
});
</script>
<style>

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 0px;
  background: url("C:\xampp\htdocs\america\storage\app\public\index\index.png");
  width: 100%;
  height: 100%;
  position: fixed;
  background-size: 100% 100%;
}

</style>
