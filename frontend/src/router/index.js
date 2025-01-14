import Home from '@/views/client/Home.vue'
import { createRouter, createWebHistory } from 'vue-router'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
    },{
      path: '/admin',
      name: 'layouts',
      component: () => import('@/views/admin/layouts/Admin.vue'),
      children: [
      { 
        path: 'users',
        name: 'users-index',
        component: () => import('@/views/admin/users/Index.vue')
      },
      { 
        path: 'users/create',
        name: 'users-create',
        component: () => import('@/views/admin/users/Create.vue')
      },
      { 
        path: 'users/:id',
        name: 'users-show',
        component: () => import('@/views/admin/users/Show.vue')
      },
      { 
        path: 'users/:id/edit',
        name: 'users-edit',
        component: () => import('@/views/admin/users/Edit.vue')
      },
      ]
    }
  ],
})

export default router
