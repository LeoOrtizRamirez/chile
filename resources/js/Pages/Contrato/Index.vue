<template>
    <AppLayout title="Contratos">
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        />
        <div class="contenedor">
            <ContenedorOpciones></ContenedorOpciones>
            <div class="contenedor-filtros-paginador-tabla">
                <!-- contenedor-filtros-paginador-tabla -->
                <div class="contenedor-filtros">
                    <ContenedorFiltros @onInput="onInput"></ContenedorFiltros>
                    <!-- inicio paginador -->
                    <div class="contenedor-paginador">
                        <!-- contenedor-paginador -->
                        <nav aria-label="Page navigation example">
                            <ul class="inline-flex items-center -space-x-px">
                                <li>
                                    <a
                                        href="#"
                                        v-on:click="getPreviousPage()"
                                        class="block px-3 py-2 ml-0 leading-tight bg-white border border-gray-300 rounded-l-lg"
                                    >
                                        <span class="sr-only">Previous</span>
                                        <svg
                                            aria-hidden="true"
                                            class="w-5 h-5"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                    </a>
                                </li>

                                <li>
                                    <a
                                        href="#"
                                        v-for="paginas in 2"
                                        v-on:click="getDataPagina(paginas)"
                                        v-bind:class="isActive(paginas)"
                                        class="px-3 py-2 leading-tight bg-white border border-gray-300"
                                        >{{ paginas }}</a
                                    >
                                </li>

                                <li>
                                    <a
                                        href="#"
                                        v-on:click="getNextPage()"
                                        class="block px-3 py-2 leading-tight bg-white border border-gray-300 rounded-r-lg"
                                    >
                                        <span class="sr-only">Next</span>
                                        <svg
                                            aria-hidden="true"
                                            class="w-5 h-5"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Fin paginador -->
                </div>
                <div class="contenedor-tabla w-full mt-6">
                    <!-- Tabla -->
                    <div class="bg-white overflow-auto">
                        <table class="w-full bg-white border border-indigo-600">
                            <thead class="">
                                <tr
                                    class="bg-paginador text-white uppercase text-sm leading-normal"
                                >
                                    <th
                                        class="titles border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                    >
                                        Acciones
                                    </th>
                                    <th
                                        class="titles border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                    >
                                        Portal
                                    </th>
                                    <th
                                        class="titles border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                    >
                                        Entidad
                                    </th>
                                    <th
                                        class="titles border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                    >
                                        Objeto
                                    </th>
                                    <th
                                        class="titles border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                    >
                                        Cuant??a
                                    </th>
                                    <th
                                        class="titles border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                    >
                                        Modalidad
                                    </th>
                                    <th
                                        class="titles border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                    >
                                        N??mero
                                    </th>
                                    <th
                                        class="titles border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                    >
                                        Estado
                                    </th>
                                    <th
                                        class="titles border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                    >
                                        F.Publicaci??n
                                    </th>
                                    <th
                                        class="titles border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                    >
                                        Ubicaci??n
                                    </th>
                                    <th
                                        class="titles border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                    >
                                        Contratista
                                    </th>
                                    <th
                                        class="titles border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                    >
                                        Actividad econ??mica
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
                                        <div
                                            class="flex items-center justify-center"
                                        >
                                            <div
                                                class="mx-auto w-full max-w-[550px]"
                                            >
                                                <div
                                                    class="-mx-3 flex flex-wrap"
                                                >
                                                    <div
                                                        class="w-full px-3 sm:w-1/2"
                                                    >
                                                        <button class="mb-3">
                                                            <span
                                                                class="material-symbols-outlined"
                                                            >
                                                                picture_as_pdf
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div
                                                        class="w-full px-3 sm:w-1/2"
                                                    >
                                                        <button class="mb-3">
                                                            <span
                                                                class="material-symbols-outlined"
                                                            >
                                                                ios_share
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div
                                                    class="-mx-3 flex flex-wrap"
                                                >
                                                    <div
                                                        class="w-full px-3 sm:w-1/2"
                                                    >
                                                        <button class="mb-3">
                                                            <span
                                                                class="material-symbols-outlined"
                                                            >
                                                                star
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div
                                                        class="w-full px-3 sm:w-1/2"
                                                    >
                                                        <button class="mb-3">
                                                            <span
                                                                class="material-symbols-outlined"
                                                            >
                                                                visibility
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div
                                                    class="-mx-3 flex flex-wrap"
                                                >
                                                    <div
                                                        class="w-full px-3 sm:w-1/2"
                                                    >
                                                        <button class="mb-3">
                                                            <span
                                                                class="material-symbols-outlined"
                                                            >
                                                                share
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div
                                                        class="w-full px-3 sm:w-1/2"
                                                    >
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
                                        <a
                                            href=""
                                            style="
                                                color: blue;
                                                cursor: pointer;
                                                display: inline-block;
                                            "
                                            >Ver m??s</a
                                        >
                                    </td>
                                    <td
                                        class="border border-gray-200 text-left py-3 px-4"
                                    >
                                        {{
                                            contrato.valor > 0
                                                ? contrato.valor.toLocaleString(
                                                      "co-CO"
                                                  )
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
                                    >
                                    {{ contrato.actividad_economica }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import ContenedorFiltros from "@/components/ContenedorFiltros.vue";
import ContenedorOpciones from "@/components/ContenedorOpciones.vue";

export default {
    props: {
        contratos: [],
    },

    components: {
        AppLayout,
        ContenedorFiltros,
        ContenedorOpciones,
    },

    data() {
        return {
            elementosPorPagina: 10,
            // contratosFiltrados: [],
            contratosFiltrados: this.contratos,
            paginaActual: 1,
        };
    },

    mounted() {
        this.getDataPagina(1);
    },

    methods: {
        totalPaginas() {
            return Math.ceil(this.contratos.length / this.elementosPorPagina);
        },

        getDataPagina(noPagina) {
            this.paginaActual = noPagina;
            this.contratosFiltrados = [];
            let ini =
                noPagina * this.elementosPorPagina - this.elementosPorPagina;
            let fin = noPagina * this.elementosPorPagina;
            this.contratosFiltrados = this.contratos.slice(ini, fin);
        },

        getPreviousPage() {
            if (this.paginaActual > 1) {
                this.paginaActual--;
            }
            this.getDataPagina(this.paginaActual);
        },

        getNextPage() {
            if (this.paginaActual < this.totalPaginas()) {
                this.paginaActual++;
            }
            this.getDataPagina(this.paginaActual);
        },
        isActive(noPagina) {
            return noPagina == this.paginaActual
                ? "bg-licitaciones dark:text-white"
                : "";
        },

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

.bg-paginador {
    background-color: #00a1c9;
}

.contenedor {
    display: flex;
    flex-direction: row;
    // border: solid 2px green;
    padding: 1px;
    margin: 1px;
}

.contenedor-filtros-paginador-tabla {
    // border: solid 2px rgb(111, 0, 135);
    padding: 1px;
    margin: 1px;
}

.contenedor-opciones {
    display: flex;
    flex-direction: column;
    // border: solid 2px red;
    margin-right: 25px;
    margin-left: 10px;
}

.contenedor-filtros {
    display: flex;
    flex-direction: row;
    // border: solid 2px rgb(195, 255, 0);
    padding: 1px;
    margin: 1px;
    justify-content: space-between;
    // background-color: #e6e6e6;
}

.contenedor-paginador {
    // border: solid 2px rgb(0, 13, 255);
    padding: 1px;
    margin-top: 25px;
    margin-right: 15px;
}

.contenedor-tabla {
    // border: solid 2px rgb(255, 0, 0);
    padding: 1px;
    margin: 1px;
}

.material-symbols-outlined-star {
    color: #00a1c9;
}

.icons {
    width: 50px;
}

.titles {
    color: white;
}
</style>
