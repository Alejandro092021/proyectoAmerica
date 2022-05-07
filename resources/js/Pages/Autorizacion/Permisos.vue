<template>
  <MainLayout>
    <Head title="Permisos" />
    <div class="py-2">
      <div class="max-w-7xl mx-auto xs:px-2 sm:px-2 lg:px-2 mb-2">
        <div class="overflow-hidden px-2">
          <div class="flex justify-between">
            <h2
              class="
                my-3
                text-2xl
                font-semibold
                text-gray-600
                dark:text-gray-200
              "
            >
              Permisos
            </h2>
          </div>

          <div>
            <div class="flex flex-col flex-wrap sm:flex-row">
              <div
                class="
                  shadow-lg
                  rounded-2xl
                  p-4
                  bg-white
                  dark:bg-gray-700
                  w-full
                "
              >
                <div class="flex flex-wrap mb-4">
                  <JetInput
                    class="mt-1 block"
                    placeholder="Buscar por nombre."
                    v-model="form.buscar"
                    type="text"
                  />
                </div>

                <JetTable class="mb-6">
                  <template #col>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Nombre</th>
                  </template>
                  <template #row>
                    <tr
                      class="
                        text-gray-500
                        hover:bg-gray-200
                        dark:hover:bg-gray-600 dark:text-gray-300
                      "
                      v-for="(p, index) in permisos.data"
                      :key="p.id"
                    >
                      <td class="px-4 py-1">{{ index + 1 }}</td>
                      <td class="px-4 py-1">{{ p.name }}</td>
                    </tr>
                    <tr v-if="permisos.data.length === 0">
                      <td class="px-4 py-1" colspan="9">
                        <p
                          class="
                            text-sm text-center text-gray-700
                            dark:text-gray-300
                          "
                        >
                          No existen permisos
                        </p>
                      </td>
                    </tr>
                  </template>
                  <template #pagination>
                    <JetPagination
                      :links="permisos.links"
                      :total="permisos.total"
                      :to="permisos.to"
                      :from="permisos.from"
                    />
                  </template>
                </JetTable>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import JetTable from "@/Componentes/Table";
import JetPagination from "@/Componentes/Pagination.vue";
import JetInput from "@/Componentes/Input.vue";
import throttle from "lodash/throttle";

export default defineComponent({
  components: {
    MainLayout,
    Head,
    Link,
    JetInput,
    JetTable,
    JetPagination,
  },
  props: {
    permisos: Object,
  },
  data() {
    return {
      form: {
        buscar: "",
      },
    };
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get(route("permisos.index"), this.form, {
          preserveState: true,
        });
      }, 150),
    },
  },
});
</script>
