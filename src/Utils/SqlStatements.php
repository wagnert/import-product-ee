<?php

/**
 * TechDivision\Import\Product\Ee\Utils\SqlStatements
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-product-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Product\Ee\Utils;

/**
 * Utility class with the SQL statements to use.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-product-ee
 * @link      http://www.techdivision.com
 */
class SqlStatements extends \TechDivision\Import\Product\Utils\SqlStatements
{

    /**
     * The SQL statement to load the product datetime attribute with the passed row/attribute/store ID.
     *
     * @var string
     */
    const PRODUCT_DATETIME = 'SELECT *
                                FROM catalog_product_entity_datetime
                               WHERE row_id = :row_id
                                 AND attribute_id = :attribute_id
                                 AND store_id = :store_id';

    /**
     * The SQL statement to load the product decimal attribute with the passed row/attribute/store ID.
     *
     * @var string
     */
    const PRODUCT_DECIMAL = 'SELECT *
                               FROM catalog_product_entity_decimal
                              WHERE row_id = :row_id
                                AND attribute_id = :attribute_id
                                AND store_id = :store_id';

    /**
     * The SQL statement to load the product integer attribute with the passed row/attribute/store ID.
     *
     * @var string
     */
    const PRODUCT_INT = 'SELECT *
                           FROM catalog_product_entity_int
                          WHERE row_id = :row_id
                            AND attribute_id = :attribute_id
                            AND store_id = :store_id';

    /**
     * The SQL statement to load the product text attribute with the passed row/attribute/store ID.
     *
     * @var string
     */
    const PRODUCT_TEXT = 'SELECT *
                            FROM catalog_product_entity_text
                           WHERE row_id = :row_id
                             AND attribute_id = :attribute_id
                             AND store_id = :store_id';

    /**
     * The SQL statement to load the product varchar attribute with the passed row/attribute/store ID.
     *
     * @var string
     */
    const PRODUCT_VARCHAR = 'SELECT *
                               FROM catalog_product_entity_varchar
                              WHERE row_id = :row_id
                                AND attribute_id = :attribute_id
                                AND store_id = :store_id';

    /**
     * The SQL statement to load the product with the passed SKU.
     *
     * @var string
     */
    const PRODUCT_BY_SKU_AND_TIMESTAMP = 'SELECT t0.*
                                            FROM catalog_product_entity t0
                                      INNER JOIN staging_update t1
                                              ON unix_timestamp(t1.start_time) > ?
                                             AND t0.created_in = t1.id
                                             AND t0.sku = ?
                                        ORDER BY unix_timestamp(t1.start_time) ASC';

    /**
     * The SQL statement to create a new sequence product value.
     *
     * @var string
     */
    const CREATE_SEQUENCE_PRODUCT = 'INSERT INTO sequence_product VALUES ()';

    /**
     * The SQL statement to create new products.
     *
     * @var string
     */
    const CREATE_PRODUCT = 'INSERT
                              INTO catalog_product_entity (entity_id,
                                                           created_in,
                                                           updated_in,
                                                           sku,
                                                           created_at,
                                                           updated_at,
                                                           has_options,
                                                           required_options,
                                                           type_id,
                                                           attribute_set_id)
                            VALUES (:entity_id,
                                    :created_in,
                                    :updated_in,
                                    :sku,
                                    :created_at,
                                    :updated_at,
                                    :has_options,
                                    :required_options,
                                    :type_id,
                                    :attribute_set_id)';

    /**
     * The SQL statement to update an existing product.
     *
     * @var string
     */
    const UPDATE_PRODUCT = 'UPDATE catalog_product_entity
                               SET entity_id = :entity_id,
                                   created_in = :created_in,
                                   updated_in = :updated_in,
                                   sku = :sku,
                                   created_at = :created_at,
                                   updated_at = :updated_at,
                                   has_options = :has_options,
                                   required_options = :required_options,
                                   type_id = :type_id,
                                   attribute_set_id = :attribute_set_id
                             WHERE row_id = :row_id';

    /**
     * The SQL statement to create a new product datetime value.
     *
     * @var string
     */
    const CREATE_PRODUCT_DATETIME = 'INSERT
                                       INTO catalog_product_entity_datetime (
                                                row_id,
                                                attribute_id,
                                                store_id,
                                                value
                                            )
                                    VALUES (:row_id,
                                            :attribute_id,
                                            :store_id,
                                            :value)';

    /**
     * The SQL statement to update an existing product datetime value.
     *
     * @var string
     */
    const UPDATE_PRODUCT_DATETIME = 'UPDATE catalog_product_entity_datetime
                                        SET row_id = :row_id,
                                            attribute_id = :attribute_id,
                                            store_id = :store_id,
                                            value = :value
                                      WHERE value_id = :value_id';

    /**
     * The SQL statement to create a new product decimal value.
     *
     * @var string
     */
    const CREATE_PRODUCT_DECIMAL = 'INSERT
                                      INTO catalog_product_entity_decimal (
                                               row_id,
                                               attribute_id,
                                               store_id,
                                               value
                                           )
                                   VALUES (:row_id,
                                           :attribute_id,
                                           :store_id,
                                           :value)';

    /**
     * The SQL statement to update an existing product decimal value.
     *
     * @var string
     */
    const UPDATE_PRODUCT_DECIMAL = 'UPDATE catalog_product_entity_decimal
                                       SET row_id = :row_id,
                                           attribute_id = :attribute_id,
                                           store_id = :store_id,
                                           value = :value
                                     WHERE value_id = :value_id';

    /**
     * The SQL statement to create a new product integer value.
     *
     * @var string
     */
    const CREATE_PRODUCT_INT = 'INSERT
                                  INTO catalog_product_entity_int (
                                           row_id,
                                           attribute_id,
                                           store_id,
                                           value
                                       )
                                VALUES (:row_id,
                                        :attribute_id,
                                        :store_id,
                                        :value)';

    /**
     * The SQL statement to update an existing product integer value.
     *
     * @var string
     */
    const UPDATE_PRODUCT_INT = 'UPDATE catalog_product_entity_int
                                   SET row_id = :row_id,
                                       attribute_id = :attribute_id,
                                       store_id = :store_id,
                                       value = :value
                                 WHERE value_id = :value_id';

    /**
     * The SQL statement to create a new product varchar value.
     *
     * @var string
     */
    const CREATE_PRODUCT_VARCHAR = 'INSERT
                                      INTO catalog_product_entity_varchar (
                                               row_id,
                                               attribute_id,
                                               store_id,
                                               value
                                           )
                                    VALUES (:row_id,
                                            :attribute_id,
                                            :store_id,
                                            :value)';

    /**
     * The SQL statement to update an existing product varchar value.
     *
     * @var string
     */
    const UPDATE_PRODUCT_VARCHAR = 'UPDATE catalog_product_entity_varchar
                                       SET row_id = :row_id,
                                           attribute_id = :attribute_id,
                                           store_id = :store_id,
                                           value = :value
                                     WHERE value_id = :value_id';

    /**
     * The SQL statement to create a new product text value.
     *
     * @var string
     */
    const CREATE_PRODUCT_TEXT = 'INSERT
                                   INTO catalog_product_entity_text (
                                            row_id,
                                            attribute_id,
                                            store_id,
                                            value
                                        )
                                 VALUES (:row_id,
                                         :attribute_id,
                                         :store_id,
                                         :value)';

    /**
     * The SQL statement to update an existing product text value.
     *
     * @var string
     */
    const UPDATE_PRODUCT_TEXT = 'UPDATE catalog_product_entity_text
                                    SET row_id = :row_id,
                                        attribute_id = :attribute_id,
                                        store_id = :store_id,
                                        value = :value
                                  WHERE value_id = :value_id';
}
