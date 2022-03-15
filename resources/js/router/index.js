import {createRouter, createWebHistory} from "vue-router";
import EmployeesIndex from "../components/employees/Index";
import EmployeesEdit from "../components/employees/Edit";
import EmployeesCreate from "../components/employees/Create";

import notFound from '../components/notFound';


const routes = [
    {
        path: "/employees",
        name: "EmployeesIndex",
        component: EmployeesIndex,
    },
    {
        path: "/employees/create",
        name: "EmployeesCreate",
        component: EmployeesCreate,
    },
    {
        path: "/employees/:id",
        name: "EmployeesEdit",
        component: EmployeesEdit,
    },
    {
        path: '/:pathMatch(.*)*', name: 'NotFound', component: notFound
    }
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
});
export default router
