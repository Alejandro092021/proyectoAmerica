<template>
  <div>
    <Head title="Solicitar" />
    <div class="min-h-screen bg-gray-100 dark:bg-gray-800">
      <div class="sm:justify-center items-center">
        <div class="flex flex-col md:flex-row">
          <div class="w-full flex-1 mx-2 mb-2">
            <div
              class="
                text-center text-3xl
                mt-5
                font-medium
                text-gray-600
                dark:text-white
              "
            >
              Importar archivo Excel
            </div>
            <div class="mt-2">
              <DarkMode />
            </div>
          </div>
        </div>

        <!-- Card registro-->
        <div class="m-auto flex flex-col flex-wrap sm:max-w-md w-full">
          <div
            class="
              shadow-lg
              rounded-2xl
              p-4
              m-auto
              sm:justify-center
              bg-white
              dark:bg-gray-600
              w-auto
            "
          >
            <form id="importar" @submit.prevent="Importar">
              <div>
                <JetLabel for="Archivo Excel" value="Ingresar Archivo Excel" />
                <div class="relative w-full overflow-hidden">
                  <div
                    v-if="!ArchivoExcelInstitucion"
                    class="flex flex-col items-center justify-center w-full"
                  >
                    <Jet-label-file
                      class="
                        text-purple-400
                        dark:bg-gray-700
                        dark:border-gray-800
                        dark:hover:border-purple-400
                      "
                      :class="{
                            'text-red-300 border-red-100 hover:bg-red-100 hover:border-red-300 dark:border-red-200  dark:hover:border-red-300':
                              v.form.DocumentoExcel.$error,
                          }"
                      
                    >
                      <div
                        class="flex flex-col items-center justify-center pt-7"
                      >
                        <svg
                          class="
                            w-10
                            h-10
                            group-hoVerPruebaHidrostatica:text-purple-600
                          "
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                          ></path>
                        </svg>
                        <p class="lowercase text-sm pt-1 tracking-wider">
                          Seleccionar Archivo Excel.xlsx
                        </p>
                      </div>
                      <Jet-input
                        type="file"
                        @change="SeleccionarArchivoExcel"
                        accept="*"
                        class="hidden"
                      />
                    </Jet-label-file>
                  </div>
                  <div v-else id="image-template">
                    <li 
                    class="block mt-2 p-1 w-full h-28">
                      <article
                        tabindex="0"
                        class="
                          group
                          bg-white
                          hasImage
                          w-full
                          h-full
                          rounded-md
                          focus:outline-none focus:shadow-outline
                          cursor-pointer
                          relative
                          text-transparent
                          hover:text-white
                          shadow-sm
                          flex flex-items-center
                          justify-center
                        "
                      >
                        <img
                          
                          alt="upload preview"
                          class="
                            img-preview
                            w-full
                            h-full
                            sticky
                            object-cover
                            rounded-md
                            bg-fixed
                          "
                        />

                        <section
                          class="
                            flex flex-col
                            rounded-md
                            text-xs
                            break-words
                            w-full
                            h-full
                            z-20
                            absolute
                            top-0
                            py-2
                            px-3
                            bg-black bg-opacity-40
                            border border-gray-400
                          "
                        >
                          <h1 class="flex-1">
                            Nombre:
                            {{ DocumentoNombreExcel }}
                          </h1>
                          <div class="flex">
                            <span class="p-1">
                              <i>
                                <svg
                                  class="fill-current w-4 h-4 ml-auto pt-"
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="24"
                                  height="24"
                                  viewBox="0 0 24 24"
                                >
                                  <path
                                    d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z"
                                  />
                                </svg>
                              </i>
                            </span>

                            <p class="p-1 size text-xs">
                              Tamaño:
                              {{ DocumentoTamanioExcel }}
                            </p>
                            <button
                              type="button"
                              @click="EliminarDocumentoExcel()"
                              class="
                                ml-auto
                                focus:outline-none
                                hover:bg-red-500
                                p-1
                                rounded-md
                              "
                            >
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  fill-rule="evenodd"
                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                  clip-rule="evenodd"
                                ></path>
                              </svg>
                            </button>
                          </div>
                        </section>
                      </article>
                    </li>

                    
                  </div>
                  <div
                        v-for="(error, index) of v.form.DocumentoExcel.$errors"
                        :key="index"
                      >
                        <div
                          class="
                            text-xs
                            px-2
                            py-2
                            text-red-400
                            dark:text-red-400
                          "
                        >
                          {{ error.$message }}
                        </div>
                      </div>
                </div>
              </div>
            </form>
            <JetButton
              form="importar"
              class="my-3"
            >
              Importar
            </JetButton>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import DarkMode from "@/Componentes/DarkMode.vue";
import JetLabel from "@/Componentes/Label.vue";
import JetInput from "@/Componentes/Input.vue";
import JetButton from "@/Componentes/Button.vue";
import useVuelidate from "@vuelidate/core";
import JetLabelFile from "@/Componentes/LabelFile.vue";
import { jsPDF } from "jspdf";
import "jspdf-autotable";

import {
  required,
  email,
  minLength,
  maxLength,
  helpers,
  numeric,
  sameAs,
  requiredIf,
} from "@vuelidate/validators";

export default defineComponent({
  components: {
    Head,
    Link,
    JetLabel,
    JetButton,
    JetInput,
    DarkMode,
    JetLabelFile,
  },
  setup() {
    const rules = {
      Valor: {
        required,
      },
    };

    return { v: useVuelidate(), rules };
  },
  data() {
    return {
      ArchivoExcelInstitucion: "",
      DocumentoNombreExcel: null,
      DocumentoTamanioExcel: null,

      form: this.$inertia.form({
        DocumentoExcel: "",
      }),

      ExtencionDocExcel: "",
    };
  },
  validations() {
    return {
      form: {
        DocumentoExcel: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),
          validarExtencionArchivo: helpers.withMessage(
            "La extencion del archivo debe ser xlsx o xlsx",
            this.ValidarExtencionArchivo
          ),
          validarTamanioArchivo: helpers.withMessage(
            "El archivo no debe exceder los 5 megabytes",
            this.ValidarTamanioArchivo
          ),
          
          $autoDirty: true,
        },
      },
    };
  },
  methods: {
    ValidarTamanioArchivo(value) {
      if (!value) {
        return true;
      }
      let file = value;
      return file.size < 625000;
    },
  ValidarExtencionArchivo(value) {
      if (!value) {
        return true;
      }
      let frmsolicitanteat = new RegExp("(.*?)\.(docx|doc|pdf|xml|bmp|xlsx)$");
      //let formatos = new RegExp("(.*?).(jpg|jpeg|png|pdf|xlsx)$");
      let file = value;
      return frmsolicitanteat.test(file.type);
    },
    
    SeleccionarArchivoExcel(e) {
      var archivos = e.target.files || e.dataTransfer.files;
      if (!archivos.length) return;
      this.CrearImagenNumeroDocumentoSolicitante(archivos[0]);
     // console.log(this.CrearImagenNumeroDocumentoSolicitante(archivos[0]));

      const nombre = archivos[0].name;
      const extencion = nombre.lastIndexOf(".");
      this.ExtencionDocExcel = nombre.substring(extencion + 1);
      console.log(this.ExtencionDocExcel);

      this.form.DocumentoExcel = archivos[0];
      console.log(this.form.DocumentoExcel);
    },
    CrearImagenNumeroDocumentoSolicitante(archivos) {
      var lector = new FileReader();
      var Mostar = this;

      this.DocumentoNombreExcel = archivos.name;
      console.log(this.DocumentoNombreExcel);

      if (archivos.size > 1024) {
        this.DocumentoTamanioExcel = Math.round(archivos.size / 1024) + "Kb";
      }
      if (archivos.size > 1048576) {
        this.DocumentoTamanioExcel = Math.round(archivos.size / 1048576) + "Mb";
      }

      lector.onload = (e) => {
        Mostar.ArchivoExcelInstitucion = e.target.result;
      };
      lector.readAsDataURL(archivos);
    },
    EliminarDocumentoExcel(e) {
      this.ArchivoExcelInstitucion = "";
      this.ExtencionDocExcel = "";
      this.form.DocumentoExcel = "";
    },

    Importar() {
      this.form.post(
        this.route("import.excel"),

        {
          onSuccess: () => {
            this.form.reset();
            this.$notify(
              {
                group: "mensajes",
                type: "success",
                title: "Exíto",
                text: "Se Logro Importar correctamente",
              },
              2000
            );
          },
          onError: (errors) => {
            this.$notify(
              {
                group: "mensajes",
                type: "error",
                title: "Error",
                text: "Importacion no registrado",
              },
              2000
            );
          },
        }
      );
    },
    /*
    async ConsultarSolicitud() {
      await axios
        .get("/buscarsol/" + this.form.NumeroSolicitud)
        .then((response) => {
          this.solicitud = response.data;

          if (this.solicitud != "") {
            if (this.solicitud.solicitud_user != null) {
              for (let valor of this.solicitud.solicitud_user) {
                
                this.descripcion = valor.descripcion;
              }
              console.log(descripcion);
            }
          } else {
            
            
            this.descripcion = "";
            this.solicitud = "";
          }

          // console.log(Object.keys(response.data).length);
        })
        .catch((err) => {
          console.log(err);
        });
    },*/
  },
});
</script>
