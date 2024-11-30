<button id="product-detail" class="form__button bg-blue-300">Product Detail</button>
<div id="product-detail-container" class=" relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!--
      Background backdrop, show/hide based on modal state.
  
      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!--
          Modal panel, show/hide based on modal state.
  
          Entering: "ease-out duration-300"
            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            To: "opacity-100 translate-y-0 sm:scale-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100 translate-y-0 sm:scale-100"
            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        -->
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 h-[70vh]">
                    <select name="lang" class="mb-3 form__select p-2 max-w-fit">
                        <option value="en">En</option>
                        <option value="vi">Vi</option>
                    </select>
                    <div class="flex gap-4">
                        <div class="w-[250px] h-auto bg-blue-50">
                            <img src="http://127.0.0.1:8000/uploads/1732528018_gOhwzIyx_IMG_2605%202.JPG"
                                alt="">
                        </div>
                        <div class="w-[250px] h-auto bg-blue-50">
                            <img src="http://127.0.0.1:8000/uploads/1732528018_gOhwzIyx_IMG_2605%202.JPG"
                                alt="">
                        </div>
                        <div class="w-[250px] h-auto bg-blue-50">
                            <img src="http://127.0.0.1:8000/uploads/1732528018_gOhwzIyx_IMG_2605%202.JPG"
                                alt="">
                        </div>
                    </div>

                    <div class="flex w-full h-auto flex-col gap-4">
                        <div class="flex items-center gap-6">
                            <h1 class="text-3xl text-orange-700 my-2">Chả cá</h1>
                            <h5 class="text-3xl text-orange-700">80.000 vnd</h5>
                        </div>
                        <p class="w-full">
                            
                            Năm 2011, thời điểm mà nền kinh tế Việt Nam đang trong giai đoạn khủng hoảng, những
                            người sáng lập DaLaVi ngày nay đã mò mẫm đi tìm sản phẩm, dịch vụ để cung cấp cho
                            thị trường. Khác với nhiều đơn vị tìm đến những thành phố sầm uất như Hà Nội, TPHCM
                            hay Đà Nẵng, chúng tôi đã quyết định về vùng đất xa xôi: Lạc Dương – Lâm Đồng để
                            khởi nghiệp. Lạc Dương cách trung tâm TP Đà Lạt 12km về phía Bắc, có khí hậu ôn hòa,
                            thiên nhiên hữu tình cùng đất đai màu mỡ. Với cơ sở là hàng chục Hecta đất trồng
                            nông nghiệp trước đó, với hàng ngàn gốc Cafe và Hồng Đà Lạt, chúng tôi đã bắt đầu
                            xây dựng thương hiệu và đi tìm hướng ra cho sản phẩm. DacsanDaLat.com.vn
                            
                        </p>
                        <div class="flex gap-4">
                            <p class="text-xl">Stock: 100</p>
                            <p class="text-xl">Da ban: 20</p>
                        </div>
                </div>

                {{-- <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:size-10">
                            <svg class="size-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-base font-semibold text-gray-900" id="modal-title">Deactivate account</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Are you sure you want to deactivate your account? All
                                    of your data will be permanently removed. This action cannot be undone.</p>
                            </div>
                        </div>
                    </div> --}}
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="button"
                    class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Deactivate</button>
                <button type="button" id="close-modal"
                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
            </div>
        </div>
    </div>
</div>
</div>
