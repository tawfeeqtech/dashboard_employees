<template>
    <div>
        <h1 class="mt-4">Employees</h1>
        <div class="row mt-4">
            <div class="col-lg-12">
                <div v-if="showMessage" class="alert alert-success">
                    {{message}}
                </div>
                <div class="card mb-4 mx-auto">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <form action="" class="row align-items-center">
                                    <div class="col-sm-6">
                                        <input type="text" name="search" class="form-control" id="autoSizingInput"
                                               placeholder="search by name">
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-outline-dark">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <router-link :to="{ name: 'EmployeesCreate'}" class="btn btn-primary float-end">Create
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered  table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#Id</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Department</th>
                                <th scope="col">Manage</th>
                            </tr>
                            </thead>
                            <tbody>


                            <tr v-for="employee in employees" :key="employee.id">
                                <th scope="row">{{employee.id}}</th>
                                <td>{{employee.first_name}}</td>
                                <td>{{employee.last_name}}</td>
                                <td>{{employee.address}}</td>
                                <td>{{employee.department.name}}</td>
                                <td>
                                    <router-link class="btn btn-success me-2" :to="{
                                        name:'EmployeesEdit',
                                        params:{
                                            id:employee.id
                                        }
                                    }">Edit
                                    </router-link>
                                    <button class="btn btn-danger" @click="deleteEmployee(employee.id)">Delete</button>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                employees: [],
                showMessage: false,
                message: ''
            }
        }, created() {
            this.getEmployees();
        }, methods: {
            getEmployees() {
                axios.get('/api/employees')
                    .then(res => {
                        this.employees = res.data.data
                    }).catch(error => {
                    console.log(error)
                });
            },
            deleteEmployee(id) {
                axios.delete('/api/employees/' + id).then(res => {
                    this.showMessage = true;
                    this.message = res.data;
                    this.getEmployees();
                }).catch(error => {
                    console.log(error)
                });
            }
        }
    }
</script>

<style>

</style>
