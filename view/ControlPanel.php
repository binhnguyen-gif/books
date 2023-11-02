    <div class="addABookForm">
        <h2>Thêm sách</h2>

        <form action="?action=submitABook" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><b>Tên sách:</b></td>
                    <td><input name="title" /></td>
                </tr>
                <tr>
                    <td><b>Tác giả:</b></td>
                    <td><input name="author" /></td>
                </tr>
                <tr>
                    <td><b>Chú thích:</b></td>
                    <td>
                        <textarea name="annotation"></textarea>
                    </td>
                </tr>
                <tr>
                    <td><b>Giá:</b></td>
                    <td><input name="price" /></td>
                </tr>
                <tr>
                    <td><b>Ảnh:</b></td>
                    <td><input type="file" name="cover" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" name="submit">Thêm</button></td>
                </tr>
            </table>
        </form>
    </div>
