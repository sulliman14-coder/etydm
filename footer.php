<footer style="background-color: #1E2A38; color: #FFFFFF;" class="py-10 px-5 font-sans" id="footer"></footer>

    <!-- Modals -->
    <div id="serviceDetailsModal" class="modal-container">
        <div class="modal-content">
            <div class="flex justify-between items-center mb-6">
                <h2 id="serviceDetailsTitle" class="text-2xl font-bold text-gray-800"></h2>
                <button data-action="close-modal" class="text-gray-500 hover:text-gray-700"><svg class="w-6 h-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            <div id="serviceDetailsContent" class="space-y-8"></div>
        </div>
    </div>

    <div id="workDetailsModal" class="modal-container">
        <div class="modal-content max-w-3xl">
            <div class="flex justify-between items-center mb-4">
                <h2 id="workDetailsTitle" class="text-2xl font-bold text-gray-800"></h2>
                <button data-action="close-modal" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div id="workDetailsContent"></div>
        </div>
    </div>

    <div id="advancedCalculatorModal" class="modal-container">
         <div class="modal-content">
             <div class="bg-white rounded-3xl overflow-hidden">
                 <div class="gradient-bg p-6 text-white">
                     <div class="flex justify-between items-center">
                         <h3 id="calculatorTitle" class="text-2xl font-bold" style="font-family: 'Cairo', sans-serif;"></h3>
                         <button data-action="close-modal" class="text-white hover:text-gray-200 text-3xl">&times;</button>
                     </div>
                     <p class="text-white text-opacity-90 mt-2" style="font-family: 'Cairo', sans-serif;">اختر الخدمات واحصل على عرض سعر فوري مع نظام الخصم الذكي</p>
                 </div>
                 <div class="p-6">
                     <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                         <div class="lg:col-span-2" id="calculator-services-content"></div>
                         <div class="lg:col-span-1">
                             <div class="bg-gradient-to-br from-purple-50 to-blue-50 p-6 rounded-2xl sticky top-4">
                                 <h4 class="text-xl font-bold text-gray-800 mb-4" style="font-family: 'Cairo', sans-serif;">ملخص الحساب</h4>
                                 <div id="calculator-selected-services" class="text-sm text-gray-600 mb-6 space-y-2">لم يتم اختيار أي خدمة بعد</div>
                                 <div class="border-t pt-4 space-y-2">
                                     <div class="flex justify-between items-center"><span class="text-gray-600">المجموع الفرعي:</span><span id="calculator-subtotal" class="font-semibold" dir="ltr">SAR 0</span></div>
                                     <div class="flex justify-between items-center text-green-600" id="calculator-discount-row" style="display: none;"><span>الخصم:</span><span id="calculator-discount" class="font-semibold" dir="ltr">SAR 0</span></div>
                                     <div class="flex justify-between items-center text-lg font-bold text-purple-600 border-t pt-2 mt-2"><span>المجموع النهائي:</span><span id="calculator-total" dir="ltr">SAR 0</span></div>
                                 </div>
                                 <div class="space-y-3 mt-6">
                                     <button id="calculator-pdf-btn" data-action="download-pdf" class="bg-red-600 hover:bg-red-700 text-white w-full py-3 rounded-xl font-bold flex items-center justify-center gap-2 transition-all opacity-50 cursor-not-allowed"><span>تحميل PDF</span></button>
                                     <button id="calculator-whatsapp-btn" data-action="send-whatsapp" class="bg-green-500 hover:bg-green-600 text-white w-full py-3 rounded-xl font-bold flex items-center justify-center gap-2 transition-all opacity-50 cursor-not-allowed"><span>إرسال واتساب</span></button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
    </div>

    <div id="quoteTemplate" class="absolute -left-[9999px] top-0 w-[794px] bg-white" style="direction: rtl;"></div>

    <?php wp_footer(); ?>
</body>
</html>