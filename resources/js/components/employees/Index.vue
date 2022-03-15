<template>
    <div>
        <h1 class="mt-4">Employees</h1>
        <div class="row mt-4">
            <div class="col-lg-12">
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
                                <router-link :to="{ name: 'EmployeesCreate'}" class="btn btn-primary float-end">Create</router-link>
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


                            <tr>
                                <th scope="row">ii</th>
                                <td>first_name</td>
                                <td>last_name</td>
                                <td>address</td>
                                <td>department</td>
                                <td>
                                    <a href="" class="btn btn-success">Edit</a>
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
        name: 'example-component',
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>

</style>
