import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/users',
      name: 'users-index',
      component: () => import('@/views/users/ListUsers.vue'),
    },
    {
      path: '/users/create',
      name: 'users-create',
      component: () => import('@/views/users/CreateUser.vue'),
    },
  ],
})

export default router
