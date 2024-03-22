<div class="modal-body">
    <div class="fs-5">Bạn có thực sự muốn xoá vị trí này không?</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
    <form action="#" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>
</div>
