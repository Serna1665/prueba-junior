<template>
    <div>
        <v-card flat>
            <v-card-text>
                <v-col cols="12" sm="6" md="12">
                    <v-alert dense text outlined color="info" class="text-center">Tareas
                    </v-alert>
                </v-col>
                <v-form>
                    <v-container grid-list-md>
                        <v-layout wrap>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field dense v-model="tareas.nombre" label="Nombre">
                                </v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="9">
                                <v-autocomplete dense :items="estado" label="Estado" v-model="tareas.estado" required>
                                </v-autocomplete>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field dense v-model="tareas.descripcion" label="Descripcion">
                                </v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field dense v-model="tareas.fecha_inicio" label="Fecha inicial" type="date">
                                </v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field dense v-model="tareas.fecha_finalizacion" label="Fecha Final" type="date">
                                </v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field dense v-model="tareas.proyecto_id" label="Proyecto Asociado">
                                </v-text-field>
                            </v-col>
                        </v-layout>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="success" small>Generar Tarea</v-btn>
                        </v-card-actions>
                    </v-container>
                </v-form>
            </v-card-text>
        </v-card>
    </div>
</template>

<script>

export default {

    data() {
        return {
            estado: ['Completado', 'No Completado'],
            tareas: {
                estado: '',
                nombre: '',
                descripcion: '',
                fecha_inicio: '',
                fecha_finalizacion: '',
                proyecto_id: ''
            },

        }
    },

    methods: {

    }
}
</script>
