import Home from '@/views/client/Home.vue'
import { createRouter, createWebHistory } from 'vue-router'
import usersRoutes from './admin/usersRoutes'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
    },
    {
      path: '/admin',
      name: 'layouts',
      component: () => import('@/views/admin/layouts/Admin.vue'),
      children: [
          ...usersRoutes,
      { 
        path: 'categories',
        name: 'categories-index',
        component: () => import('@/views/admin/categories/Index.vue')
      },
      { 
        path: 'categories/create',
        name: 'categories-create',
        component: () => import('@/views/admin/categories/Create.vue')
      },
      { 
        path: 'categories/:id',
        name: 'categories-show',
        component: () => import('@/views/admin/categories/Show.vue')
      },
      { 
        path: 'categories/:id/edit',
        name: 'categories-edit',
        component: () => import('@/views/admin/categories/Edit.vue')
      },
      {
        path: 'songs',
        name: 'songs-index',
        component: () => import('@/views/admin/songs/Index.vue'),
      },
      {
        path: 'songs/create',
        name: 'songs-create',
        component: () => import('@/views/admin/songs/Create.vue'),
      },
      {
        path: 'songs/:id',
        name: 'songs-show',
        component: () => import('@/views/admin/songs/Show.vue'),
      },
      {
        path: 'songs/:id/edit',
        name: 'songs-edit',
        component: () => import('@/views/admin/songs/Edit.vue'),
      },
      {
        path: 'lyrics',
        name: 'lyrics-index',
        component: () => import('@/views/admin/lyrics/Index.vue'),
      },
      {
        path: 'lyrics/create',
        name: 'lyrics-create',
        component: () => import('@/views/admin/lyrics/Create.vue'),
      },
      {
        path: 'lyrics/:id/edit',
        name: 'lyrics-edit',
        component: () => import('@/views/admin/lyrics/Edit.vue'),
      },
      {
        path: 'artists',
        name: 'artists-index',
        component: () => import('@/views/admin/artists/Index.vue'),
      },
      {
        path: 'artists/create',
        name: 'artists-create',
        component: () => import('@/views/admin/artists/Create.vue'),
      },
      ]
    },
    {
      path: '/auth/login',
      name: 'auth-login',
      component: () => import('@/views/auth/Login.vue'),
    },
    {
      path: '/songs/test',
      name: 'songs-test',
      component: () => import('@/views/SongTest.vue'),
    },
  ],
})

export default router
