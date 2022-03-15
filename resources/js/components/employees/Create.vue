<template>
    <div>
        <h1 class="mt-4">Employee</h1>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Create Employees
                        <router-link :to="{ name: 'EmployeesIndex'}" class="float-end">Back</router-link>
                    </div>

                    <div class="card-body">
                        <form>

                            <div class="row mb-3">
                                <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="middle_name" class="col-md-4 col-form-label text-md-end">Middle Name</label>

                                <div class="col-md-6">
                                    <input id="middle_name" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="country" class="col-md-4 col-form-label text-md-end">Country</label>

                                <div class="col-md-6">
                                    <select id="country" class="form-select form-control" aria-label="Default select">
                                        <option selected>select country</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="state" class="col-md-4 col-form-label text-md-end">State</label>

                                <div class="col-md-6">
                                    <select id="state" class="form-select form-control" aria-label="Default select">
                                        <option selected>select country</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="department" class="col-md-4 col-form-label text-md-end">Department</label>

                                <div class="col-md-6">
                                    <select id="department" class="form-select form-control"
                                            aria-label="Default select">
                                        <option selected>select country</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-end">City</label>

                                <div class="col-md-6">
                                    <select id="city" class="form-select form-control" aria-label="Default select">
                                        <option selected>select country</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="zip_code" class="col-md-4 col-form-label text-md-end">Zip Code</label>

                                <div class="col-md-6">
                                    <input id="zip_code" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">Birth date</label>
                                <div class="col-md-6">
                                    <Datepicker v-model="date"></Datepicker>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">DateHired</label>
                                <div class="col-md-6">
                                    <Datepicker v-model="date"></Datepicker>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Store
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {ref} from 'vue';
    import Datepicker from 'vue3-date-time-picker';
    import 'vue3-date-time-picker/dist/main.css';

    export default {
        components: {Datepicker},
        data() {
            return {
                countries: [],
                states: [],
                departments: [],
                cities: [],
            }
        },
        created() {
            this.getCountries();
        },
        methods: {
            getCountries() {
                axios.get('/api/employees/countries')
                    .then(res => {
                        this.countries = res.data
                    }).catch(error => {
                    console.log(console.error)
                });
            }
        },
        setup() {
            const date = ref();

            return {
                date
            }
        }
    }
</script>

<style>

</style>
