<?php
@props(['show' => false, 'adImage' => '', 'adUrl' => ''])

<div x-data="{ showModal: false }"
     x-show="showModal"
     x-on:keydown.escape.window="showModal = false"
     x-on:show-ad.window="showModal = true"
     class="fixed inset-0 z-50 overflow-y-auto"
     style="display: none;">
    <div class="flex items-center justify-center min-h-screen px-4">
        <!-- オーバーレイ背景 -->
        <div x-show="showModal"
             x-transition:enter="transition-opacity ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-500 bg-opacity-75"
             @click="showModal = false">
        </div>

        <!-- モーダルコンテンツ -->
        <div x-show="showModal"
             x-transition:enter="transition-transform ease-out duration-300"
             x-transition:enter-start="translate-y-4 opacity-0"
             x-transition:enter-end="translate-y-0 opacity-100"
             x-transition:leave="transition-transform ease-in duration-200"
             x-transition:leave-start="translate-y-0 opacity-100"
             x-transition:leave-end="translate-y-4 opacity-0"
             class="relative bg-white rounded-lg shadow-xl max-w-lg w-full">
            
            <!-- 広告コンテンツ -->
            <div class="p-6">
                <a href="{{ $adUrl }}" target="_blank" rel="noopener noreferrer" title="広告の詳細を見る">
                    <img src="{{ $adImage }}" alt="Advertisement" class="w-full h-auto">
                </a>
            </div>

            <!-- 閉じるボタン -->
            <button @click="showModal = false"
                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-500"
                    title="広告を閉じる">
                <span class="sr-only">閉じる</span>
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>