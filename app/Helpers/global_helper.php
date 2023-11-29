<?php

function showToast($selectedType, $headerText, $bodyText)
{
    $html = '<div class="bs-toast toast toast-placement-ex m-2" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-semibold">' . $headerText . '</div>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">' . $bodyText . '</div>
            </div>
            <script src="/vendor/js/bootstrap.js"></script>
            <script src="/js/main.js"></script>
            <script>
                const toastPlacementExample = document.querySelector(".toast-placement-ex");
                selectedType = "' . $selectedType . '";
                selectedPlacement = ["bottom-0", "end-0"];
                toastPlacementExample.classList.add(selectedType);
                DOMTokenList.prototype.add.apply(toastPlacementExample.classList, selectedPlacement);
                toastPlacement = new bootstrap.Toast(toastPlacementExample);
                toastPlacement.show();
            </script>';

    return $html;
}

function rupiahFormat($price)
{
    $formattedPrice = 'Rp' . number_format($price, 0, ',', '.');

    return $formattedPrice;
}

function rupiahFormatDashboard($price)
{
    $formattedPrice = 'Rp' . number_format($price, 0, ',', '.');
    return $formattedPrice;
}

function generateRandomString($length)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randomString = '';
    $charactersLength = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
