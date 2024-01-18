<style>
    
    .card {
        padding: 0;
        width: 18rem;
        overflow: hidden;
        perspective: 1000px;
        border-radius: 12px;
        position: relative; /* Thêm vào để làm cho các phần tử con có thể được định vị tương đối với thẻ cha */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .add-to-cart-btn {
        position: absolute;
        top: 30%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #007bff;
        color: #ffffff;
        border: none;
        padding: 8px 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        display: none;
    }
    .card:hover .card-img-top{
      opacity: 0.5;
    }

    .card:hover .add-to-cart-btn {
        /* opacity: 1; */
        display: block;
        border: 1px solid;
    }

    .add-to-cart-btn:hover {
        background-color: #0056b3;
    }

    /* Dưới đây là phần CSS của bạn */
    .card-img-top {
        margin: 0;
        padding: 0;
        max-width: 100%;
        height: 60%;
    }

    img {
        border-radius: 12px;
    }
</style>
