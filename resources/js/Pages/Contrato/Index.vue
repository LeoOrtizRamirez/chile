<template>
    <AppLayout title="Contratos">
        <template #header>
            <ContenedorFiltros @onInput="onInput"></ContenedorFiltros>
            <!-- <Paginador></Paginador> -->
            <link
                rel="stylesheet"
                href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
            />
        </template>

        <div class="w-full mt-6">
            <div class="bg-white overflow-auto">
                <table class="table w-full bg-white border border-indigo-600">
                    <thead class="">
                        <tr
                            class="bg-licitaciones text-white uppercase text-sm leading-normal"
                        >
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Acciones
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Portal
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Entidad
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Objeto
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Cuantía
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Modalidad
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Número
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Estado
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                F.Publicación
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Ubicación
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Contratista
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Actividad económica
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr
                            v-for="contrato in contratosFiltrados"
                            :key="contrato.id"
                        >
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                <div class="flex items-center justify-center">
                                    <div class="mx-auto w-full max-w-[550px]">
                                        <div class="-mx-3 flex flex-wrap">
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <span
                                                        class="material-symbols-outlined"
                                                    >
                                                        picture_as_pdf
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <span
                                                        class="material-symbols-outlined"
                                                    >
                                                        ios_share
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="-mx-3 flex flex-wrap">
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <span
                                                        class="material-symbols-outlined"
                                                    >
                                                        star
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <span
                                                        class="material-symbols-outlined"
                                                    >
                                                        visibility
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="-mx-3 flex flex-wrap">
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <span
                                                        class="material-symbols-outlined"
                                                    >
                                                        share
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <span
                                                        class="material-symbols-outlined"
                                                    >
                                                        folder_delete
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.fuente.alias_portal }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.entidad_contratante }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                                :title="contrato.objeto"
                            >
                                {{ contrato.objeto.substr(0, 30) }}...
                                <a href="" style="color:blue; cursor:pointer; display:inline-block">Ver más</a>
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{
                                    contrato.valor > 0
                                        ? contrato.valor.toLocaleString("co-CO")
                                        : contrato.valor_texto
                                }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.modalidad }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.codigo_proceso }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.estado_proceso }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.fecha_publicacion }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.ubicacion }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.contratista }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            ></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import ContenedorFiltros from "@/components/ContenedorFiltros.vue";
/* import Paginador from "@/components/Paginador.vue"; */

export default {
    props: {
        contratos: [],
    },

    components: {
        AppLayout,
        ContenedorFiltros,
       /*  Paginador, */
    },

    data() {
        return {
            contratosFiltrados: this.contratos,
        };
    },

  
    methods: {
        onInput(value) {
            // debugger;
            this.busquedaRapida(value);
            // console.log();
        },

        busquedaRapida(value) {
            this.contratosFiltrados = this.contratos.filter(function (el) {
                return (
                    el.entidad_contratante
                        .toUpperCase()
                        .indexOf(value.toUpperCase()) !== -1 ||
                    el.objeto.toUpperCase().indexOf(value.toUpperCase()) !==
                        -1 ||
                    el.ubicacion.toUpperCase().indexOf(value.toUpperCase()) !==
                        -1
                );
            });
            console.log(this.contratosFiltrados);
        },
    },
};
</script>


<style lang="scss" scoped>
.bg-licitaciones {
    background-color: #00a1c9;
}

.material-symbols-outlined-star {
    color: #00a1c9;
}
</style>
