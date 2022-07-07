<template>

  <div class="bg-gray-100 dark:bg-gray-800 h-screen overflow-hidden relative">
    <div class="flex items-start justify-between">
      <!-- add class hidden -->
      <div
        class="h-screen hidden md:block pb-8 mt-4 ml-4 relative"
        :class="estadoMenu ? 'w-72' : 'w-16'"
      >
        <main
          class="bg-white overflow-y-auto h-full rounded-2xl dark:bg-gray-700 shadow-lg " 
        >
          <div class="flex items-center justify-center pt-6 bg-auto bg-no-repeat bg-center" id="app3" >
            
              <Link :href="route('inicio')" v-if="estadoMenu" >
              
            </Link>
            <Link :href="route('inicio')" v-else>
              
            </Link>
            
            
          </div>
          <SidebarDesktop v-if="estadoMenu" />
          <SidebarNormal v-else />
        </main>
      </div>

      <div class="flex flex-col w-full p-2 md:p-4 md:space-y-4">
        <Header @menu="abrirMenu" @mobil="abrirMenuMobil" />
        <SidebarDesktop
          class="flex md:hidden shadow-xl rounded-md bg-white dark:bg-gray-700"
          v-if="estadoMenuMobil"
        />
        <!-- <SidebarMobil v-if="estadoMenuMobil"/> -->
        <main class=" h-screen pb-24 pt-4 md:pt-0 md:pr-0 md:pl-0">
        <Toastr/>
          <slot> 
      </slot>
        </main>
      </div>
    </div>
    
  </div>
</template>

<script>
import { defineComponent } from "vue";
import SidebarDesktop from "@/Componentes/SidebarDesktop.vue";
import SidebarNormal from "@/Componentes/SidebarNormal.vue";
import SidebarMobil from "@/Componentes/SidebarMobil.vue";
import Header from "@/Componentes/Header.vue";
import Toastr from "@/Componentes/Toastr.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    SidebarDesktop,
    SidebarNormal,
    SidebarMobil,
    Header,
    Toastr,
    Link,
  },

  data() {
    return {
      estadoMenu: true,
      estadoMenuMobil: false,
    };
  },
  methods: {
    abrirMenu() {
      this.estadoMenu = !this.estadoMenu;
    },
    abrirMenuMobil() {
      this.estadoMenuMobil = !this.estadoMenuMobil;
    },
  },
});
</script>


<style>

#app3 {
  
  
 background: url("C:\xampp\htdocs\proyectoAmerica\storage\app\public\logo.png");
  background-size: contain;
  background-size: 100% 120%;
  height: 130px;
  width: auto;
  
  
}

</style>