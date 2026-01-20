define(['jquery'], function ($) {
    'use strict';

    /**
     * Live search
     * @param {Object} config
     * @param {string} config.inputId
     * @param {string} config.tableId
     * @param {string} config.pagerId
     */
    return function (config) {
        const $input = $(config.inputId);
        const $tableBody = $(`${config.tableId} tbody`);
        const $rows = $tableBody.find('tr');
        const $pager = $(config.pagerId);

        function escapeRegex(text) {
            return text.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        }

        function highlight(text, term) {
            if (!term) {
                return text;
            }
            const regex = new RegExp(`(${escapeRegex(term)})`, 'gi');
            return text.replace(regex, '<mark>$1</mark>');
        }

        $input.on('keyup', function () {
            const keyword = $(this).val().trim().toLowerCase();
            $pager.toggle(keyword === '');

            $rows.each(function () {
                const $row = $(this);
                const $title = $row.find('.title');
                const $author = $row.find('.author');

                const originalTitle = $title.attr('data-original') || $title.text();
                const originalAuthor = $author.attr('data-original') || $author.text();

                const titleText = originalTitle.toLowerCase();
                const authorText = originalAuthor.toLowerCase();

                const isMatch =
                    keyword === '' ||
                    titleText.includes(keyword) ||
                    authorText.includes(keyword);

                if (isMatch) {
                    $row.show();
                    $title.html(highlight(originalTitle, keyword));
                    $author.html(highlight(originalAuthor, keyword));
                } else {
                    $row.hide();
                }
            });
        });
    };
});
